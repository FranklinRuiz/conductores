<?php

namespace app\modules\persona\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
//models
use app\models\Personas;

/**
 * Default controller for the `persona` module
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

    public function actionPrueba() {
        return $this->render('prueba');
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGetModal() {
        $plantilla = Yii::$app->controller->renderPartial("crear", []);
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->response->data = ["plantilla" => $plantilla];
    }

    public function actionCreate() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();

            $post = Yii::$app->request->post();

            try {

                $persona = new Personas();
                $persona->dni = $post['dni'];
                $persona->nombres = $post['nombres'];
                $persona->apellido_paterno = $post['apellido_paterno'];
                $persona->apellido_materno = $post['apellido_materno'];
                $persona->sexo = $post['sexo'];
                $persona->id_usuario_reg = Yii::$app->user->getId();
                $persona->fecha_reg = Utils::getFechaActual();
                $persona->ipmaq_reg = Utils::obtenerIP();

                if (!$persona->save()) {
                    Utils::show($persona->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Persona");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($persona->id_persona);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalEdit($id) {
        $data = Personas::findOne($id);
        $plantilla = Yii::$app->controller->renderPartial("editar", [
            "persona" => $data
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
                $persona = Personas::findOne($post['id_persona']);
                $persona->dni = $post['dni'];
                $persona->nombres = $post['nombres'];
                $persona->apellido_paterno = $post['apellido_paterno'];
                $persona->apellido_materno = $post['apellido_materno'];
                $persona->sexo = $post['sexo'];
                $persona->id_usuario_act = Yii::$app->user->getId();
                $persona->fecha_act = Utils::getFechaActual();
                $persona->ipmaq_act = Utils::obtenerIP();

                if (!$persona->update()) {
                    Utils::show($persona->getErrors(), true);
                    throw new HttpException("No se puede actualizar datos Persona");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($persona->id_persona);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionDelete() {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();

            try {
                //Traemos los datos mediante el id 
                $persona = Personas::findOne($post['id_persona']);
                $persona->id_usuario_del = Yii::$app->user->getId();
                $persona->fecha_del = Utils::getFechaActual();
                $persona->ipmaq_del = Utils::obtenerIP();

                if (!$persona->save()) {
                    Utils::show($persona->getErrors(), true);
                    throw new HttpException("No se puede eliminar registro persona");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($persona->id_persona);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionLista() {

        $page = empty($_POST["start"]);
        $pages = empty($_POST["length"]);
        $buscar = empty($_POST["search"]["value"]) ? '' : $_POST["search"]["value"];
//        $perpage = $_POST["pagination"]["perpage"];
//        $row = ($page * $perpage) - $perpage;
//        $length = ($perpage * $page) - 1;

        try {
            $command = Yii::$app->db->createCommand('call listadoPersona(:row,:length,:buscar)');
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
                "dni" => $row['dni'],
                "nombres" => $row['nombres'],
                "apellido_paterno" => $row['apellido_paterno'],
                "apellido_materno" => $row['apellido_materno'],
                "accion" => '<button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionEditar(' . $row["id_persona"] . ')"><i class="flaticon-edit"></i>Editar</button>
                             <button class="btn btn-sm btn-light-danger font-weight-bold mr-2" onclick="funcionEliminar(' . $row["id_persona"] . ')"><i class="flaticon-delete"></i>Eliminar</button>',
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
