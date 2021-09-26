<?php

namespace app\modules\bandeja\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
use yii\helpers\Url;
use app\models\Archivos;
use app\models\InformeTecnicos;
use app\models\HojaRutas;

/**
 * Default controller for the `bandeja` module
 */
class TecnicoController extends Controller {

    public $enableCsrfValidation = false;

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGetModalInforme() {
        $plantilla = Yii::$app->controller->renderPartial("informe", []);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionUpload() {

        if (!empty($_FILES)) {
            $transaction = Yii::$app->db->beginTransaction();

            $archivo = new Archivos();
            $tempFile = $_FILES['file']['tmp_name'];
            $targetFile = Url::to('@app/modules/bandeja/archivos/') . $_FILES['file']['name'];
            move_uploaded_file($tempFile, $targetFile);
            $archivo->nombre = $_FILES['file']['name'];
            $archivo->path = Url::to('@web/modules/home/archivos/') . $_FILES['file']['name'];
            $archivo->tipo = $_FILES['file']['type'];
            $archivo->id_usuario_reg = Yii::$app->user->getId();
            $archivo->fecha_reg = Utils::getFechaActual();
            $archivo->ipmaq_reg = Utils::obtenerIP();

            if (!$archivo->save()) {
                Utils::show($archivo->getErrors(), true);
                throw new HttpException("No se puede guardar datos archivo");
            }

            $transaction->commit();

            echo json_encode($archivo->id_archivo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionInforme() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();
            try {
                $informe = new InformeTecnicos();
                $informe->id_orden_trabajo = $post["id_orden"];
                $informe->id_archivo = $post["id_archivo"];
                $informe->descripcion_falla = $post["descripcion"];
                $informe->diagnostico = $post["diagnostico"];
                $informe->recomendaciones = $post["recomendaciones"];
                $informe->id_usuario_reg = Yii::$app->user->getId();
                $informe->fecha_reg = Utils::getFechaActual();
                $informe->ipmaq_reg = Utils::obtenerIP();

                if (!$informe->save()) {
                    Utils::show($informe->getErrors(), true);
                    throw new HttpException("No se puede guardar datos informe");
                }

                $old = HojaRutas::find()->where(["id_orden_trabajo" => $post["id_orden"], "flg_estado" => Utils::ACTIVO])->one();
                $old->estado = Utils::ESTADO_ATENDIDO;

                if (!$old->save()) {
                    Utils::show($old->getErrors(), true);
                    throw new HttpException("No se puede guardar datos ruta");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($informe->id_informe_tecnico);
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
            $command = Yii::$app->db->createCommand('call bandejaTecnico(:row,:length,:buscar,:idUsuario,@total)');
            $command->bindValue(':row', $row);
            $command->bindValue(':length', $perpage);
            $command->bindValue(':buscar', $buscar);
            $command->bindValue(':idUsuario', Yii::$app->user->getId());
            $result = $command->queryAll();
            $total_registro = Yii::$app->db->createCommand("select @total as result;")->queryScalar();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }

        $data = [];
        foreach ($result as $k => $row) {
            $botones = "";
            $botones .= '<button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionFicha(' . $row["id_equipo"] . ')"><i class="flaticon-list-1"></i>Ficha</button>';
            if ($row['estado'] != "ATENDIDO") {
                $botones .= '<button class="btn btn-sm btn-light-primary font-weight-bold mr-2" onclick="funcionInforme(' . $row["id_orden_trabajo"] . ')"><i class="flaticon-list"></i>Informe</button>';
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
                "accion" => $botones,
            ];
        }

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