<?php

namespace app\modules\preventivo\controllers;

use yii\web\Controller;
use app\modules\preventivo\query\consultas;
use app\models\Preventivos;
use app\components\Utils;
use Yii;
use app\models\Equipos;

/**
 * Default controller for the `preventivo` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGenerar() {

        $mes = $_POST["mes"];
        $fechas = $this->diasLaborables($mes);

        $cont = 0;
        foreach ($fechas as $f) {
            $equipos = consultas::listaEquiposPreventivo($cont);
            foreach ($equipos as $e) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    $preventivo = new Preventivos();
                    $preventivo->id_equipo = $e["id_equipo"];
                    $preventivo->fecha_mantenimiento = $f;
                    $preventivo->estado_orden = Utils::ESTADO_PROGRAMADO;
                    $preventivo->prioridad = Utils::PREORIDAD_BAJA;
                    $preventivo->id_usuario_reg = Yii::$app->user->getId();
                    $preventivo->fecha_reg = Utils::getFechaActual();
                    $preventivo->ipmaq_reg = Utils::obtenerIP();

                    if (!$preventivo->save()) {
                        Utils::show($preventivo->getErrors(), true);
                        throw new HttpException("No se puede guardar datos preventivo");
                    }

                    $transaction->commit();
                } catch (Exception $ex) {
                    Utils::show($ex, true);
                    $transaction->rollback();
                }
            }
            $cont = $cont + 2;
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = 1;
    }

    public function actionLista() {
        $mes = $_POST["mes"];
        $data = consultas::listaPreventivo($mes);
        $datos = [];
        foreach ($data as $d) {
            $estilo = "";
            if ($d["prioridad"] == "ALTA") {
                $estilo = "fc-event-light fc-event-solid-danger";
            } else if ($d["prioridad"] == "MEDIA") {
                $estilo = "fc-event-light fc-event-solid-warning";
            } else {
                $estilo = "fc-event-light fc-event-solid-primary";  
            }
            array_push($datos, [
                'id' => $d["id_preventivo"],
                'title' => $d["equipo"],
                'start' => $d["fecha_mantenimiento"],
                'description' => "Orden de trabajo programado preventivo",
                'end' => $d["fecha_mantenimiento"],
                'className' => $estilo
            ]);
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $datos;
    }

    function diasLaborables($mes) {
        $fechas = [];

        $anio = date('Y');
        $dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);
        for ($i = 1; $i <= $dias_mes; $i++) {
            if (date('N', strtotime($anio . '-' . $mes . '-' . $i)) != 7) {
                array_push($fechas, ($anio . '-' . $mes . '-' . $i));
            }
        }

        return $fechas;
    }

    public function actionGetModal($id) {
        $preventivo = Preventivos::findOne($id);
        $equipo = Equipos::find()->where(["fecha_del" => null])->all();
        try {
            $command = Yii::$app->db->createCommand('call listaTecnicos');
            $result = $command->queryAll();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }
        $plantilla = Yii::$app->controller->renderPartial("asignar", [
            "preventivo" => $preventivo,
            "equipo" => $equipo,
            "tecnico" => $result
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionActualizar() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();
            try {
                $preventivo = Preventivos::findOne($post["id_preventivo"]);
                $preventivo->prioridad = $post["prioridad"];
                $preventivo->id_usuario_asignado = $post["tecnico"];
                $preventivo->id_usuario_act = Yii::$app->user->getId();
                $preventivo->fecha_act = Utils::getFechaActual();
                $preventivo->ipmaq_act = Utils::obtenerIP();

                if (!$preventivo->save()) {
                    Utils::show($preventivo->getErrors(), true);
                    throw new HttpException("No se puede guardar datos preventivo");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($preventivo->id_preventivo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

}
