<?php

namespace app\modules\equipo\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
use app\models\Equipos;
use app\models\Tipos;
use app\models\FichaTecnicas;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;

/**
 * Default controller for the `equipo` module
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
        $tipo = Tipos::find()->where(["fecha_del" => null])->all();
        $plantilla = Yii::$app->controller->renderPartial("crear", [
            "tipo" => $tipo
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionCreate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();
            try {

                $equipo = new Equipos();
                $equipo->id_tipo = $post['tipo'];
                $equipo->nombre_equipo = $post['nombre'];
                $equipo->descripcion = $post['descripcion'];
                $equipo->id_usuario_reg = Yii::$app->user->getId();
                $equipo->fecha_reg = Utils::getFechaActual();
                $equipo->ipmaq_reg = Utils::obtenerIP();

                if (!$equipo->save()) {
                    Utils::show($equipo->getErrors(), true);
                    throw new HttpException("No se puede guardar datos equipo");
                }

                $ficha = new FichaTecnicas();
                $ficha->id_equipo = $equipo->id_equipo;
                $ficha->fabricante = $post['fabricante'];
                $ficha->fecha_fabricacion = $post['fecha_fabricacion'];
                $ficha->marca = $post['marca'];
                $ficha->modelo = $post['modelo'];
                $ficha->serie = $post['serie'];
                $ficha->vida_util = $post['vida_util'];
                $ficha->fecha_activacion = $post['fecha_activacion'];
                $ficha->id_usuario_reg = Yii::$app->user->getId();
                $ficha->fecha_reg = Utils::getFechaActual();
                $ficha->ipmaq_reg = Utils::obtenerIP();

                if (!$ficha->save()) {
                    Utils::show($ficha->getErrors(), true);
                    throw new HttpException("No se puede guardar datos ficha");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($equipo->id_equipo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalEdit($id) {
        $data = Equipos::findOne($id);
        $tipo = Tipos::find()->where(["fecha_del" => null])->all();
        $ficha = FichaTecnicas::find()->where(["fecha_del" => null, "id_equipo" => $id])->one();
        $plantilla = Yii::$app->controller->renderPartial("editar", [
            "equipo" => $data,
            "tipo" => $tipo,
            "ficha" => $ficha
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionUpdate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {
                $equipo = Equipos::findOne($post["id_equipo"]);
                $equipo->id_tipo = $post['tipo'];
                $equipo->nombre_equipo = $post['nombre'];
                $equipo->descripcion = $post['descripcion'];
                $equipo->id_usuario_act = Yii::$app->user->getId();
                $equipo->fecha_act = Utils::getFechaActual();
                $equipo->ipmaq_act = Utils::obtenerIP();

                if (!$equipo->save()) {
                    Utils::show($equipo->getErrors(), true);
                    throw new HttpException("No se puede guardar datos equipo");
                }

                $ficha = FichaTecnicas::findOne($post["id_ficha"]);
                $ficha->id_equipo = $equipo->id_equipo;
                $ficha->fabricante = $post['fabricante'];
                $ficha->fecha_fabricacion = $post['fecha_fabricacion'];
                $ficha->marca = $post['marca'];
                $ficha->modelo = $post['modelo'];
                $ficha->serie = $post['serie'];
                $ficha->vida_util = $post['vida_util'];
                $ficha->fecha_activacion = $post['fecha_activacion'];
                $ficha->id_usuario_act = Yii::$app->user->getId();
                $ficha->fecha_act = Utils::getFechaActual();
                $ficha->ipmaq_act = Utils::obtenerIP();

                if (!$ficha->save()) {
                    Utils::show($ficha->getErrors(), true);
                    throw new HttpException("No se puede guardar datos ficha");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($equipo->id_equipo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionDelete() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();

            try {
                $equipo = Equipos::findOne($post['id_equipo']);
                $equipo->id_usuario_del = Yii::$app->user->getId();
                $equipo->fecha_del = Utils::getFechaActual();
                $equipo->ipmaq_del = Utils::obtenerIP();

                if (!$equipo->save()) {
                    Utils::show($equipo->getErrors(), true);
                    throw new HttpException("No se puede eliminar registro equipo");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($equipo->id_equipo);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalFicha($id) {
        $ficha = FichaTecnicas::find()->where(["fecha_del" => null, "id_equipo" => $id])->one();
        $plantilla = Yii::$app->controller->renderPartial("ficha", [
            "ficha" => $ficha
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionLista() {

        $page = empty($_POST["pagination"]["page"]) ? 0 : $_POST["pagination"]["page"];
        $pages = empty($_POST["pagination"]["pages"]) ? 1 : $_POST["pagination"]["pages"];
        $buscar = empty($_POST["query"]["generalSearch"]) ? '' : $_POST["query"]["generalSearch"];
        $perpage = $_POST["pagination"]["perpage"];
        $row = ($page * $perpage) - $perpage;
//        $length = ($perpage * $page) - 1;

        try {
            $command = Yii::$app->db->createCommand('call listadoEquipo(:row,:length,:buscar)');
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
                "id" => "E-" . str_pad($row["id_equipo"], 5, "0",STR_PAD_LEFT),
                "tipo" => $row['tipo'],
                "nombre_equipo" => $row['nombre_equipo'],
                "descripcion" => $row['descripcion'],
                "accion" => '<button class="btn btn-sm btn-light-primary font-weight-bold mr-2" onclick="funcionFicha(' . $row["id_equipo"] . ')"><i class="flaticon-file-2"></i>Ficha</button>
                             <button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionEditar(' . $row["id_equipo"] . ')"><i class="flaticon-edit"></i>Editar</button>
                             <button class="btn btn-sm btn-light-danger font-weight-bold mr-2" onclick="funcionEliminar(' . $row["id_equipo"] . ')"><i class="flaticon-delete"></i>Eliminar</button>',
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

    public function actionExcel() {
        // $id = $_POST['id_remitente'];
        //$fecha = $_POST['fecha'];
        //  $data = ConsultasManifiestoV::getImprimirExcel($fecha);
        $command = Yii::$app->db->createCommand('call splistaEquipo');
        $data = $command->queryAll();

        $filename = "Equipo.xlsx";

        $spreadsheet = new Spreadsheet();

        $styleArray = [
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $styleBorder = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ]
        ];

        $styleBold = [
            'font' => [
                'bold' => true,
            //'size' => 13
            ],
        ];

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells("C2:M2");
        $sheet->setCellValue('C2', ' HOSPITAL ALBERTO SABOGAL SOLOGUREN');
        $sheet->getStyle('C2')->applyFromArray(['font' => ['bold' => true, 'size' => 20], 'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER,]]);
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $sheet->mergeCells("B5:I5");
        $sheet->setCellValue('B5', 'LISTA DE EQUIPO');
        $sheet->getStyle('B5')->applyFromArray(['font' => ['bold' => true, 'size' => 15], 'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER_CONTINUOUS,]]);

        $sheet->getStyle('A6:J6')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('335593');
        $sheet->getStyle('A6:J6')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getPageSetup()->setScale(73);
        $sheet->getPageSetup()
                ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);


        $sheet->getPageSetup()->setHorizontalCentered(true);
        $sheet->getPageSetup()->setVerticalCentered(false);

        $sheet->getPageMargins()->setTop(0);
        $sheet->getPageMargins()->setRight(0);
        $sheet->getPageMargins()->setLeft(0);
        $sheet->getPageMargins()->setBottom(0);

        $sheet->setCellValue('A6', 'ITEM');
        $sheet->setCellValue('B6', 'NOMBRE');
        $sheet->setCellValue('C6', 'TIPO');
        $sheet->setCellValue('D6', 'MARCA');
        $sheet->setCellValue('E6', 'MODELO');
        $sheet->setCellValue('F6', 'SERIE');
        $sheet->setCellValue('G6', 'DESCRIPCION');
        $sheet->setCellValue('H6', 'AREA');
        $sheet->setCellValue('I6', 'SECCION');
        $sheet->setCellValue('J6', 'ESTADO');

        $i = 7;
        $contador = 1;
        foreach ($data as $k => $v) {

            //   $fecha = ($v['fecha'] == null) ? '-' : date("d/m/Y", strtotime($v['fecha']));
            $sheet->setCellValue('A' . $i, '' . $contador);
            $sheet->setCellValue('B' . $i, $v['nombre_equipo']);
            $sheet->setCellValue('C' . $i, $v['tipo']);
            $sheet->setCellValue('D' . $i, $v['marca']);
            $sheet->setCellValue('E' . $i, $v['modelo']);
            $sheet->setCellValue('F' . $i, $v['serie']);
            $sheet->setCellValue('G' . $i, $v['descripcion']);
            $sheet->setCellValue('H' . $i, $v['area']);
            $sheet->setCellValue('I' . $i, $v['seccion']);
            $sheet->setCellValue('J' . $i, $v['estado_equipos']);

            $contador++;
            $i++;
        }

        $sheet->getStyle('A7' . ':J' . ($i - 1))->applyFromArray($styleBorder);

        foreach (range('A', 'I') as $columnID) {
            $sheet->getColumnDimension($columnID)
                    ->setAutoSize(true);
        }

        // $drawing->setWorksheet($sheet);
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $response = Yii::$app->getResponse();
        $headers = $response->getHeaders();
        $headers->set('Content-Type', 'application/vnd.ms-excel');
        $headers->set('Content-Disposition', 'attachment;filename="' . $filename . '"');

        ob_start();
        $writer->save("php://output");
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }

}
