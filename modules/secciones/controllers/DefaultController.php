<?php

namespace app\modules\secciones\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
//models
use app\models\Secciones;

/**
 * Default controller for the `secciones` module
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
        $area = \app\models\Areas::find()->where(["fecha_del" => null])->all();
        $plantilla = Yii::$app->controller->renderPartial("crear", [
            "area" => $area
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionCreate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();
            try {
                $secciones = new Secciones();
                $secciones->codigo_seccion = $post['codigo_seccion'];
                $secciones->nombre_seccion = $post['nombre_seccion'];
                $secciones->id_area = $post['id_area'];
                $secciones->id_usuario_reg = Yii::$app->user->getId();
                $secciones->fecha_reg = Utils::getFechaActual();
                $secciones->ipmaq_reg = Utils::obtenerIP();

                if (!$secciones->save()) {
                    Utils::show($secciones->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Secciones");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($secciones->id_seccion);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalEdit($id) {
        $data = Secciones::findOne($id);
        $area = \app\models\Areas::find()->where(["fecha_del" => null])->all();
        $plantilla = Yii::$app->controller->renderPartial("editar", [
            "secciones" => $data,
            "area" => $area
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionUpdate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {
                $secciones = Secciones::findOne($post['id_seccion']);
                $secciones->codigo_seccion = $post['codigo_seccion'];
                $secciones->nombre_seccion = $post['nombre_seccion'];
                $secciones->id_area = $post['id_area'];
                $secciones->id_usuario_act = Yii::$app->user->getId();
                $secciones->fecha_act = Utils::getFechaActual();
                $secciones->ipmaq_act = Utils::obtenerIP();

                if (!$secciones->save()) {
                    Utils::show($secciones->getErrors(), true);
                    throw new HttpException("No se puede actualizar datos Secciones");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($secciones->id_seccion);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionDelete() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();

            try {
                $secciones = Secciones::findOne($post['id_seccion']);
                $secciones->id_usuario_del = Yii::$app->user->getId();
                $secciones->fecha_del = Utils::getFechaActual();
                $secciones->ipmaq_del = Utils::obtenerIP();

                if (!$secciones->save()) {
                    Utils::show($secciones->getErrors(), true);
                    throw new HttpException("No se puede eliminar registro secciones");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($secciones->id_seccion);
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
            $command = Yii::$app->db->createCommand('call listadoSecciones(:row,:length,:buscar)');
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
                "codigo_seccion" => $row['codigo_seccion'],
                "nombre_seccion" => $row['nombre_seccion'],
                "nombre_area" => $row['nombre_area'],
                "accion" => '<button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionEditar(' . $row["id_seccion"] . ')"><i class="flaticon-edit"></i>Editar</button>
                             <button class="btn btn-sm btn-light-danger font-weight-bold mr-2" onclick="funcionEliminar(' . $row["id_seccion"] . ')"><i class="flaticon-delete"></i>Eliminar</button>',
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
