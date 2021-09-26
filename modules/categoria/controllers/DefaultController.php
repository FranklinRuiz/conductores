<?php

namespace app\modules\categoria\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
//models
use app\models\Categorias;
/**
 * Default controller for the `categoria` module
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
                $categoria = new Categorias();
                $categoria->descripcion = $post['descripcion'];
                $categoria->id_usuario_reg = Yii::$app->user->getId();
                $categoria->fecha_reg = Utils::getFechaActual();
                $categoria->ipmaq_reg = Utils::obtenerIP();

                if (!$categoria->save()) {
                    Utils::show($categoria->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Categoria");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($categoria->id_categoria);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalEdit($id) {
        $data = Categorias::findOne($id);
        $plantilla = Yii::$app->controller->renderPartial("editar", [
            "categoria" => $data
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionUpdate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {
                $categoria = Categorias::findOne($post['id_categoria']);
                $categoria->descripcion = $post['descripcion'];
                $categoria->id_usuario_act = Yii::$app->user->getId();
                $categoria->fecha_act = Utils::getFechaActual();
                $categoria->ipmaq_act = Utils::obtenerIP();

                if (!$categoria->update()) {
                    Utils::show($categoria->getErrors(), true);
                    throw new HttpException("No se puede actualizar datos Categoria");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($categoria->id_categoria);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionDelete() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();

            try {
                $categoria = Categorias::findOne($post['id_categoria']);
                $categoria->id_usuario_del = Yii::$app->user->getId();
                $categoria->fecha_del = Utils::getFechaActual();
                $categoria->ipmaq_del = Utils::obtenerIP();

                if (!$categoria->save()) {
                    Utils::show($categoria->getErrors(), true);
                    throw new HttpException("No se puede eliminar registro categoria");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($categoria->id_categoria);
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
            $command = Yii::$app->db->createCommand('call listadoCategoria(:row,:length,:buscar)');
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
                "descripcion" => $row['descripcion'],
                "accion" => '<button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionEditar(' . $row["id_categoria"] . ')"><i class="flaticon-edit"></i>Editar</button>
                             <button class="btn btn-sm btn-light-danger font-weight-bold mr-2" onclick="funcionEliminar(' . $row["id_categoria"] . ')"><i class="flaticon-delete"></i>Eliminar</button>',
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
