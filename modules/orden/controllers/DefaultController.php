<?php

namespace app\modules\orden\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
use app\models\Categorias;
use app\models\Secciones;
use app\models\OrdenTrabajos;
use app\models\HojaRutas;
use yii\helpers\Url;

/**
 * Default controller for the `orden` module
 */
class DefaultController extends Controller {

    public $enableCsrfValidation = false;

    //Hola, soy Franklin y yo Dayron
// hola soy paolo 
    // soy marco xd

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGetModal() {
        $categoria = Categorias::find()->where(["fecha_del" => null])->all();
        $seccion = Secciones::find()->where(["fecha_del" => null, "id_area" => Yii::$app->user->identity->id_area])->all();

        $plantilla = Yii::$app->controller->renderPartial("crear", [
            "categoria" => $categoria,
            "seccion" => $seccion
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionGetEquipo() {
        $id = $_POST["id"];
        $command = Yii::$app->db->createCommand('select e.id_equipo,e.nombre_equipo
                                                from movimientos v 
                                                inner join equipos e on v.id_equipo = e.id_equipo and e.fecha_del is null
                                                where v.flg_activo = 1 and v.id_seccion = :idSeccion');
        $command->bindValue(':idSeccion', $id);
        $result = $command->queryAll();

        $data = "";
        foreach ($result as $r) {
            $data .= ' <option value="' . $r["id_equipo"] . '">' . "E-" . str_pad($r["id_equipo"], 5, "0", STR_PAD_LEFT) . '::' . $r["nombre_equipo"] . '</option>';
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $data;
    }

    public function actionCreate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {

                $orden = new OrdenTrabajos();
                $orden->id_seccion = $post['seccion'];
                $orden->id_categoria = $post['categoria'];
                $orden->id_equipo = $post['equipo'];
                $orden->descripcion = $post['descripcion'];
                $orden->flg_atencion = 1;
                $orden->id_usuario_reg = Yii::$app->user->getId();
                $orden->fecha_reg = Utils::getFechaActual();
                $orden->ipmaq_reg = Utils::obtenerIP();

                if (!$orden->save()) {
                    Utils::show($orden->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Orden");
                }

                $ruta = new HojaRutas();
                $ruta->id_orden_trabajo = $orden->id_orden_trabajo;
                $ruta->id_usuario_origen = Yii::$app->user->getId();
                $ruta->flg_estado = Utils::ACTIVO;
                $ruta->estado = Utils::ESTADO_SOLICITADO;

                if (!$ruta->save()) {
                    Utils::show($ruta->getErrors(), true);
                    throw new HttpException("No se puede guardar datos ruta");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($orden->id_orden_trabajo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalEdit($id) {
        $data = OrdenTrabajos::findOne($id);
        $categoria = Categorias::find()->where(["fecha_del" => null])->all();
        $seccion = Secciones::find()->where(["fecha_del" => null, "id_area" => Yii::$app->user->identity->id_area])->all();
        $plantilla = Yii::$app->controller->renderPartial("editar", [
            "orden" => $data,
            "categoria" => $categoria,
            "seccion" => $seccion
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
                $orden = OrdenTrabajos::findOne($post['id_orden']);
                $orden->id_seccion = $post['seccion'];
                $orden->id_categoria = $post['categoria'];
                $orden->id_equipo = $post['equipo'];
                $orden->descripcion = $post['descripcion'];
                $orden->id_usuario_act = Yii::$app->user->getId();
                $orden->fecha_act = Utils::getFechaActual();
                $orden->ipmaq_act = Utils::obtenerIP();

                if (!$orden->save()) {
                    Utils::show($orden->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Orden");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($orden->id_orden_trabajo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionDelete() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();

            try {
                $orden = OrdenTrabajos::findOne($post['id_orden']);
                $orden->id_usuario_del = Yii::$app->user->getId();
                $orden->fecha_del = Utils::getFechaActual();
                $orden->ipmaq_del = Utils::obtenerIP();

                if (!$orden->save()) {
                    Utils::show($orden->getErrors(), true);
                    throw new HttpException("No se puede eliminar registro orden");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($orden->id_orden_trabajo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionImprimir($id) {
        $result = [];
        try {
            $command = Yii::$app->db->createCommand('call pdfInforme(:idOrden)');
            $command->bindValue(':idOrden', $id);
            $result = $command->queryOne();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }

        $pdf = new \FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Text(65, 20, 'Informe de Orden de Servicio');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 40, 'Categoria:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(20, 45, $result["categoria"]);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 55, 'Seccion:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(20, 60, $result["seccion"]);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 70, 'Equipo:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(20, 75, $result["equipo"]);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 85, 'Descripcion:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(20, 90, $result["descripcion"]);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 100, 'Tecnico:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(20, 105, $result["tecnico"]);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 115, 'Descripcion Falla:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(20, 120, $result["descripcion_falla"]);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 130, 'Diagnostico:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(20, 135, $result["diagnostico"]);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 145, 'Recomendaciones:');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(20, 150, $result["recomendaciones"]);

        $pdf->Image(Url::to('@app/modules/bandeja/archivos/') . $result["archivo"], 50, 165, 100, 70);

        $pdf->Text(80, 270, "-------------------------------");
        $pdf->Text(88, 273, "Firma y sello");

        ob_get_clean();
        $pdf->Output();
        exit;
    }

    public function actionLista() {

        $page = empty($_POST["pagination"]["page"]) ? 0 : $_POST["pagination"]["page"];
        $pages = empty($_POST["pagination"]["pages"]) ? 1 : $_POST["pagination"]["pages"];
        $buscar = empty($_POST["query"]["generalSearch"]) ? '' : $_POST["query"]["generalSearch"];
        $perpage = $_POST["pagination"]["perpage"];
        $row = ($page * $perpage) - $perpage;
//        $length = ($perpage * $page) - 1;

        $result = [];
        try {
            $command = Yii::$app->db->createCommand('call listadoOrden(:row,:length,:idMedico,:buscar)');
            $command->bindValue(':row', $row);
            $command->bindValue(':length', $perpage);
            $command->bindValue(':idMedico', Yii::$app->user->getId());
            $command->bindValue(':buscar', $buscar);
            $result = $command->queryAll();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }

        $data = [];
        foreach ($result as $k => $row) {
            $botones = "";
            if ($row['estado'] == "SOLICITADO") {
                $botones .= '<button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionEditar(' . $row["id_orden_trabajo"] . ')"><i class="flaticon-edit"></i>Editar</button>
                             <button class="btn btn-sm btn-light-danger font-weight-bold mr-2" onclick="funcionEliminar(' . $row["id_orden_trabajo"] . ')"><i class="flaticon-delete"></i>Eliminar</button>';
            } else if ($row['estado'] == "ATENDIDO") {
                $botones .= '<a class="btn btn-sm btn-light-primary font-weight-bold mr-2"  target="_blank" href="orden/default/imprimir/' . $row["id_orden_trabajo"] . '"><i class="icon-xl far fa-file-pdf"></i>Informe</a>';
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
