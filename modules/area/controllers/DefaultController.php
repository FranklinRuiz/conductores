<?php

namespace app\modules\area\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
use app\models\Areas;
/**
 * Default controller for the `area` module
 */
class DefaultController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGetModal() {
        $plantilla = Yii::$app->controller->renderPartial("crear", [
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionCreate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();
            try {
                $area = new Areas();
                $area->codigo_area = $post['codigo_seccion'];
                $area->nombre_area = $post['nombre_seccion'];
                $area->id_usuario_reg = Yii::$app->user->getId();
                $area->fecha_reg = Utils::getFechaActual();
                $area->ipmaq_reg = Utils::obtenerIP();

                if (!$area->save()) {
                    Utils::show($area->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Area");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($area->id_area);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalEdit($id) {
        $data = Areas::findOne($id);
        $plantilla = Yii::$app->controller->renderPartial("editar", [
            "area" => $data
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionUpdate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {
                $area = Areas::findOne($post['id_area']);
                $area->codigo_area = $post['codigo_area'];
                $area->nombre_area = $post['nombre_area'];
                $area->id_usuario_act = Yii::$app->user->getId();
                $area->fecha_act = Utils::getFechaActual();
                $area->ipmaq_act = Utils::obtenerIP();

                if (!$area->save()) {
                    Utils::show($area->getErrors(), true);
                    throw new HttpException("No se puede actualizar datos Area");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($area->id_area);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionDelete() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();

            try {
                $area = Areas::findOne($post['id_area']);
                $area->id_usuario_del = Yii::$app->user->getId();
                $area->fecha_del = Utils::getFechaActual();
                $area->ipmaq_del = Utils::obtenerIP();

                if (!$area->save()) {
                    Utils::show($area->getErrors(), true);
                    throw new HttpException("No se puede eliminar registro area");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($area->id_area);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionLista() {
        $page = empty($_GET["start"]) ? 0 : $_GET["start"];
        $pages = empty($_GET["length"]) ? 10 : $_GET["length"];;
        $buscar = empty($_GET["search"]["value"]) ? '' : $_GET["search"]["value"];

        try {
            $command = Yii::$app->db->createCommand('call listadoArea(:row,:length,:buscar)');
            $command->bindValue(':row', $page);
            $command->bindValue(':length', $pages);
            $command->bindValue(':buscar', $buscar);
            $result = $command->queryAll();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }

        $data = [];
        foreach ($result as $k => $row) {
            $data[] = [
                "codigo_area" => $row['codigo_area'],
                "nombre_area" => $row['nombre_area'],
                "accion" => '<button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionEditar(' . $row["id_area"] . ')"><i class="bi bi-pencil-fill"></i>Editar</button>
                             <button class="btn btn-sm btn-light-danger font-weight-bold mr-2" onclick="funcionEliminar(' . $row["id_area"] . ')"><i class="bi bi-trash-fill"></i>Eliminar</button>',
            ];
        }

        $totalData = isset($result[0]['total']) ? $result[0]['total'] : 0;

        $json_data = [
            'recordsTotal'    => $totalData,
            'recordsFiltered' => $totalData,
            'data'            =>$data,
        ];

        ob_start();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $json_data;
    }
}
