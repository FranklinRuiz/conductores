<?php

namespace app\modules\bandeja\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
use app\models\HojaRutas;

/**
 * Default controller for the `bandeja` module
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

    public function actionGetModalDerivar() {
        try {
            $command = Yii::$app->db->createCommand('call listaTecnicos');
            $result = $command->queryAll();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }
        $plantilla = Yii::$app->controller->renderPartial("derivar", [
            "tecnicos" => $result
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionDerivar() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {
                $old = HojaRutas::find()->where(["id_orden_trabajo" => $post["id_orden"], "flg_estado" => Utils::ACTIVO])->one();
                $old->flg_estado = Utils::INACTIVO;
                if (!$old->save()) {
                    Utils::show($old->getErrors(), true);
                    throw new HttpException("No se puede guardar datos ruta");
                }

                $ruta = new HojaRutas();
                $ruta->id_orden_trabajo = $post["id_orden"];
                $ruta->id_usuario_origen = Yii::$app->user->getId();
                $ruta->id_usuario_destino = $post["tecnico"];
                $ruta->comentario = $post["comentario"];
                $ruta->flg_estado = Utils::ACTIVO;
                $ruta->estado = Utils::ESTADO_DERIVADO;

                if (!$ruta->save()) {
                    Utils::show($ruta->getErrors(), true);
                    throw new HttpException("No se puede guardar datos ruta");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($ruta->id_hoja_ruta);
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

        $total_registro = 0;
        try {
            $command = Yii::$app->db->createCommand('call bandejaEncargadoTecnico(:row,:length,:buscar,@total)');
            $command->bindValue(':row', $row);
            $command->bindValue(':length', $perpage);
            $command->bindValue(':buscar', $buscar);
            $result = $command->queryAll();
            $total_registro = Yii::$app->db->createCommand("select @total as result;")->queryScalar();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }

        $data = [];
        foreach ($result as $k => $row) {
            $botones = "";
            if ($row['estado'] != "ATENDIDO") {
                $botones .= '<button class="btn btn-sm btn-light-primary font-weight-bold mr-2" onclick="funcionDerivar(' . $row["id_orden_trabajo"] . ')"><i class="icon-xl la la-share"></i>Derivar</button>';
            }

            $estado = "";
            switch ($row['estado']) {
                case "SOLICITADO":
                    $estado = "info";
                    break;
                case "DERIVADO":
                    $estado = "primary";
                    break;
                case "ATENDIDO":
                    $estado = "success";
                    break;
            }

            $data[] = [
                "categoria" => $row['categoria'],
                "seccion" => $row['seccion'],
                "equipo" => $row['equipo'],
                "descripcion" => $row['descripcion'],
                "estado" => '<span style="width: 108px;"><span class="label font-weight-bold label-lg  label-light-' . $estado . ' label-inline">' . $row['estado'] . '</span></span>',
                "tecnico" => $row['tecnico'],
                "accion" => $botones,
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
                "total" => $total_registro
            ]
        ];

        ob_start();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $json_data;
    }

}
