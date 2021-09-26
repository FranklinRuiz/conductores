<?php

namespace app\modules\movimiento\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
use app\models\Movimientos;
use app\models\Equipos;
use app\models\Areas;
use app\models\EstadoEquipos;
use app\models\Secciones;
use app\modules\movimiento\consultas\query;

/**
 * Default controller for the `movimiento` module
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
        $equipo = query::getEquipo(); //Equipos::find()->where(["fecha_del" => null])->all();
        $area = Areas::find()->where(["fecha_del" => null])->all();
        $estado = EstadoEquipos::find()->where(["fecha_del" => null])->all();
        $plantilla = Yii::$app->controller->renderPartial("crear", [
            "equipo" => $equipo,
            "area" => $area,
            "estado" => $estado
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionGetSeccion() {
        $id = $_POST["id"];
        $seccion = Secciones::find()->where(["fecha_del" => null, "id_area" => $id])->all();

        $data = "";
        foreach ($seccion as $s) {
            $data .= '<option value="' . $s->id_seccion . '">' . $s->codigo_seccion . ' - ' . $s->nombre_seccion . '</option>';
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $data;
    }

    public function actionCreate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {

                $movimiento = new Movimientos();
                $movimiento->id_equipo = $post["equipo"];
                $movimiento->id_seccion = $post["seccion"];
                $movimiento->id_estado = $post["estado"];
                $movimiento->flg_activo = 1;
                $movimiento->id_usuario_reg = Yii::$app->user->getId();
                $movimiento->fecha_reg = Utils::getFechaActual();
                $movimiento->ipmaq_reg = Utils::obtenerIP();

                if (!$movimiento->save()) {
                    Utils::show($movimiento->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Movimiento");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($movimiento->id_movimiento);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalMover($id) {
        $data = Movimientos::findOne($id);
        $equipo = Equipos::findOne($data->id_equipo);
        $area = Areas::find()->where(["fecha_del" => null])->all();
        $estado = EstadoEquipos::find()->where(["fecha_del" => null])->all();
        $plantilla = Yii::$app->controller->renderPartial("mover", [
            "equipo" => $equipo,
            "area" => $area,
            "estado" => $estado
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
                $movimiento = Movimientos::findOne($post['id_movimiento']);
                $movimiento->flg_activo = 0;
                $movimiento->id_usuario_act = Yii::$app->user->getId();
                $movimiento->fecha_act = Utils::getFechaActual();
                $movimiento->ipmaq_act = Utils::obtenerIP();

                if (!$movimiento->save()) {
                    Utils::show($movimiento->getErrors(), true);
                    throw new HttpException("No se puede cambiar datos Movimiento");
                }

                $movimientoNuevo = new Movimientos();
                $movimientoNuevo->id_equipo = $movimiento->id_equipo;
                $movimientoNuevo->id_seccion = $post["seccion"];
                $movimientoNuevo->id_estado = $post["estado"];
                $movimientoNuevo->flg_activo = 1;
                $movimientoNuevo->id_usuario_reg = Yii::$app->user->getId();
                $movimientoNuevo->fecha_reg = Utils::getFechaActual();
                $movimientoNuevo->ipmaq_reg = Utils::obtenerIP();

                if (!$movimientoNuevo->save()) {
                    Utils::show($movimientoNuevo->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Movimiento");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($movimiento->id_movimiento);
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
            $command = Yii::$app->db->createCommand('call listadoMovimiento(:row,:length,:buscar)');
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
                "equipo" => $row['equipo'],
                "area" => $row['area'],
                "seccion" => $row['seccion'],
                "estado" => $row['estado'],
                "accion" => '<button class="btn btn-sm btn-light-primary font-weight-bold mr-2" onclick="funcionMover(' . $row["id_movimiento"] . ')"><i class="flaticon-share"></i>Mover Equipo</button>',
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
