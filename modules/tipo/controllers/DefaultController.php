<?php

namespace app\modules\tipo\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
use app\models\Tipos;

/**
 * Default controller for the `tipo` module
 */
class DefaultController extends Controller {

    public $enableCsrfValidation = false;

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGetModal() {
        $plantilla = Yii::$app->controller->renderPartial("crear", []);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionCreate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();
            try {
                $tipo = new Tipos();
                $tipo->nombre = $post['nombre'];
                $tipo->id_usuario_reg = Yii::$app->user->getId();
                $tipo->fecha_reg = Utils::getFechaActual();
                $tipo->ipmaq_reg = Utils::obtenerIP();

                if (!$tipo->save()) {
                    Utils::show($tipo->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Tipo");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($tipo->id_tipo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }
    public function actionGetModalEdit($id) {
        $data = Tipos::findOne($id);
        $plantilla = Yii::$app->controller->renderPartial("editar", [
            "tipo" => $data
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionUpdate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {
                //Traemos los datos mediante el id 
                $tipo = Tipos::findOne($post['id_tipo']);
                $tipo->nombre = $post['nombre'];
                $tipo->id_usuario_act = Yii::$app->user->getId();
                $tipo->fecha_act = Utils::getFechaActual();
                $tipo->ipmaq_act = Utils::obtenerIP();

                if (!$tipo->update()) {
                    Utils::show($tipo->getErrors(), true);
                    throw new HttpException("No se puede actualizar datos Tipo");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($tipo->id_tipo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionDelete() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();

            try {
                //Traemos los datos mediante el id 
                $tipo = Tipos::findOne($post['id_tipo']);
                $tipo->id_usuario_del = Yii::$app->user->getId();
                $tipo->fecha_del = Utils::getFechaActual();
                $tipo->ipmaq_del = Utils::obtenerIP();

                if (!$tipo->save()) {
                    Utils::show($tipo->getErrors(), true);
                    throw new HttpException("No se puede eliminar registro tipo");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($tipo->id_tipo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }
    public function actionLista() {

        $page = empty($_POST["pagination"]["page"]) ? 0 : $_POST["pagination"]["page"];
        $pages = empty($_POST["pagination"]["pages"]) ? 1 : $_POST["pagination"]["pages"];
        $buscar = empty($_POST["query"]["generalSearch"]) ? '' : $_POST["query"]["generalSearch"];
        $perpage = $_POST["pagination"]["perpage"];
        $row = ($page * $perpage) - $perpage;
//        $length = ($perpage * $page) - 1;

        try {
            $command = Yii::$app->db->createCommand('call listadoTipo(:row,:length,:buscar)');
            $command->bindValue(':row', $row);
            $command->bindValue(':length', $perpage);
            $command->bindValue(':buscar', $buscar);
            $result = $command->queryAll();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }

        $data = [];
        foreach ($result as $k => $row) {
            $data[] = [
                "nombre" => $row['nombre'],
                "accion" => '<button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionEditar(' . $row["id_tipo"] . ')"><i class="flaticon-edit"></i>Editar</button>
                             <button class="btn btn-sm btn-light-danger font-weight-bold mr-2" onclick="funcionEliminar(' . $row["id_tipo"] . ')"><i class="flaticon-delete"></i>Eliminar</button>',
            ];
        }

        $totalData = isset($result[0]['total']) ? $result[0]['total'] : 0;

        $json_data = [
            "data" => $data,
            "meta" => [
                "page" => $page,
                "pages" => $pages,
                "perpage" => $perpage,
                "sort" => "asc",
                "total" => $totalData
            ]
        ];

        ob_start();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $json_data;
    }

}
