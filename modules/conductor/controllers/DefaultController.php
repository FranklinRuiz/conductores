<?php

namespace app\modules\conductor\controllers;

use app\components\Utils;
use app\models\Conductores;
use app\models\EstadosConductor;
use app\models\EstadosVerificacion;
use app\models\Paises;
use app\models\Personas;
use app\models\TiposLicenciaInterna;
use app\models\TiposLicenciaOficial;
use yii\web\Controller;
use yii\web\HttpException;
use Yii;

/**
 * Default controller for the `conductor` module
 */
class DefaultController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetModal()
    {
        $personas = Personas::find()->where(["fecha_del" => null])->all();
        $pais = Paises::find()->all();
        $estadoConductor = EstadosConductor::find()->all();
        $estadoVerificacion = EstadosVerificacion::find()->all();
        $tipoLicenciaOficial = TiposLicenciaOficial::find()->all();
        $tipoLicenciaInterno = TiposLicenciaInterna::find()->all();

        $plantilla = Yii::$app->controller->renderPartial("crear", [
            "personas" => $personas,
            "pais" => $pais,
            "estadoConductor" => $estadoConductor,
            "estadoVerificacion" => $estadoVerificacion,
            "tipoLicenciaOficial" => $tipoLicenciaOficial,
            "tipoLicenciaInterno" => $tipoLicenciaInterno
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionCreate()
    {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {

                $conductor = new Conductores();
                $conductor->id_persona = $post["persona"];
                $conductor->id_pais = $post["pais"];
                $conductor->fecha_emision_licencia_oficial = $post["fecha_emision_licencia_oficial"];
                $conductor->fecha_vencimiento_licencia_oficial = $post["fecha_vencimiento_licencia_oficial"];
                $conductor->numero_licencia_oficial = $post["numero_licencia_oficial"];
                $conductor->fecha_emision_licencia_interna = $post["fecha_emision_licencia_interna"];
                $conductor->fecha_vencimiento_licencia_interna = $post["fecha_vencimiento_licencia_interna"];
                $conductor->numero_licencia_interna = $post["numero_licencia_interna"];
                $conductor->id_estado_conductor = $post["estado_conductor"];
                $conductor->id_estado_verificacion = $post["estado_verificacion"];
                $conductor->id_tipo_licencia_oficial = $post["tipo_licencia_oficial"];
                $conductor->id_tipo_licencia_interna = $post["tipo_licencia_interno"];
                $conductor->id_usuario_reg = Yii::$app->user->getId();
                $conductor->fecha_reg = Utils::getFechaActual();
                $conductor->ipmaq_reg = Utils::obtenerIP();

                if (!$conductor->save()) {
                    Utils::show($conductor->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Persona");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($conductor->id_conductor);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalEdit($id)
    {
        $data = Conductores::findOne($id);
        $personas = Personas::find()->where(["fecha_del" => null])->all();
        $pais = Paises::find()->all();
        $estadoConductor = EstadosConductor::find()->all();
        $estadoVerificacion = EstadosVerificacion::find()->all();
        $tipoLicenciaOficial = TiposLicenciaOficial::find()->all();
        $tipoLicenciaInterno = TiposLicenciaInterna::find()->all();
        $plantilla = Yii::$app->controller->renderPartial("editar", [
            "conductor" => $data,
            "personas" => $personas,
            "pais" => $pais,
            "estadoConductor" => $estadoConductor,
            "estadoVerificacion" => $estadoVerificacion,
            "tipoLicenciaOficial" => $tipoLicenciaOficial,
            "tipoLicenciaInterno" => $tipoLicenciaInterno
        ]);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionUpdate()
    {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {
                //Traemos los datos mediante el id
                $conductor = Conductores::findOne($post["id_conductor"]);
                $conductor->id_persona = $post["persona"];
                $conductor->id_pais = $post["pais"];
                $conductor->fecha_emision_licencia_oficial = $post["fecha_emision_licencia_oficial"];
                $conductor->fecha_vencimiento_licencia_oficial = $post["fecha_vencimiento_licencia_oficial"];
                $conductor->numero_licencia_oficial = $post["numero_licencia_oficial"];
                $conductor->fecha_emision_licencia_interna = $post["fecha_emision_licencia_interna"];
                $conductor->fecha_vencimiento_licencia_interna = $post["fecha_vencimiento_licencia_interna"];
                $conductor->numero_licencia_interna = $post["numero_licencia_interna"];
                $conductor->id_estado_conductor = $post["estado_conductor"];
                $conductor->id_estado_verificacion = $post["estado_verificacion"];
                $conductor->id_tipo_licencia_oficial = $post["tipo_licencia_oficial"];
                $conductor->id_tipo_licencia_interna = $post["tipo_licencia_interno"];
                $conductor->id_usuario_reg = Yii::$app->user->getId();
                $conductor->fecha_reg = Utils::getFechaActual();
                $conductor->ipmaq_reg = Utils::obtenerIP();

                if (!$conductor->update()) {
                    Utils::show($conductor->getErrors(), true);
                    throw new HttpException("No se puede actualizar datos conductor");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($conductor->id_conductor);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionDelete()
    {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();

            try {
                //Traemos los datos mediante el id
                $conductor = Conductores::findOne($post["id_conductor"]);
                $conductor->id_usuario_del = Yii::$app->user->getId();
                $conductor->fecha_del = Utils::getFechaActual();
                $conductor->ipmaq_del = Utils::obtenerIP();

                if (!$conductor->save()) {
                    Utils::show($conductor->getErrors(), true);
                    throw new HttpException("No se puede eliminar registro conductor");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($conductor->id_conductor);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionLista()
    {
        $page = empty($_GET["start"]) ? 0 : $_GET["start"];
        $pages = empty($_GET["length"]) ? 10 : $_GET["length"];;
        $buscar = empty($_GET["search"]["value"]) ? '' : $_GET["search"]["value"];

        $result = [];

        $totalData = 0;
        try {
            $command = Yii::$app->db->createCommand('call listaConductor(:row,:length,:buscar,@total)');
            $command->bindValue(':row', $page);
            $command->bindValue(':length', $pages);
            $command->bindValue(':buscar', $buscar);
            $result = $command->queryAll();
            $totalData = Yii::$app->db->createCommand("select @total as result;")->queryScalar();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }

        $data = [];
        foreach ($result as $k => $row) {
            $data[] = [
                "numero_licencia_oficial" => $row['numero_licencia_oficial'],
                "persona" => $row['persona'],
                "fecha_emision_licencia_oficial" => $row['fecha_emision_licencia_oficial'],
                "estado_conductor" => $row['estado_conductor'],
                "estado_verificacion" => $row['estado_verificacion'],
                "tipo_licencia_oficial" => $row['tipo_licencia_oficial'],
                "accion" => '<button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionEditar(' . $row["id_conductor"] . ')"><i class="bi bi-pencil-fill"></i>Editar</button>
                             <button class="btn btn-sm btn-light-danger font-weight-bold mr-2" onclick="funcionEliminar(' . $row["id_conductor"] . ')"><i class="bi bi-trash-fill"></i>Eliminar</button>',
            ];
        }

        $json_data = [
            'recordsTotal' => $totalData,
            'recordsFiltered' => $totalData,
            'data' => $data,
        ];

        ob_start();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = $json_data;
    }

}
