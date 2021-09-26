<?php

namespace app\modules\dashboard\controllers;

use yii\web\Controller;
use Yii;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use yii\filters\AccessControl;

/**
 * Default controller for the `dashboard` module
 */
class DefaultController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'index',
                            'get-grafico',
                            'excel',
                            'orden-trabajo',
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $command1 = Yii::$app->db->createCommand('call reporteOrden');
        $orden = $command1->queryAll();

        $command2 = Yii::$app->db->createCommand('call reportePreventivo');
        $preventivo = $command2->queryAll();
        return $this->render('index', [
                    "orden" => $orden,
                    "preventivo" => $preventivo
        ]);
    }

    public function actionGetGrafico() {
        $command = Yii::$app->db->createCommand('call graficoPrueba');
        $result = $command->queryAll();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $result;
    }

    public function actionExcel() {

        $command = Yii::$app->db->createCommand('call graficoPrueba');
        $data = $command->queryAll();

        $filename = "prueba.xlsx";

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
        $sheet->mergeCells("A1:B1");
        $sheet->setCellValue('A1', 'LISTA PRUEBA');
        $sheet->getStyle('A1')->applyFromArray(['font' => ['bold' => true, 'size' => 15], 'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER,]]);

        $sheet->getStyle('A3:B3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('335593');
        $sheet->getStyle('A3:B3')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);

        $sheet->setCellValue('A3', 'NOMBRE');
        $sheet->setCellValue('B3', 'CANTIDAD');

        $i = 4;
        foreach ($data as $v) {
            $sheet->setCellValue('A' . $i, $v['nombre_seccion']);
            $sheet->setCellValue('B' . $i, $v['cantidad']);

            $i++;
        }

        $sheet->getStyle('A3' . ':B' . ($i - 1))->applyFromArray($styleBorder);


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

    public function actionOrdenTrabajo() {
        $command = Yii::$app->db->createCommand('call rerporteEquipo');
        $result = $command->queryAll();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $result;
    }

}
