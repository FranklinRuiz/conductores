<?php

namespace app\modules\seguridad\controllers;

use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use Exception;
use app\components\Utils;
use app\models\Opciones;
use app\models\Perfiles;
use app\models\PerfilOpcion;

/**
 * Default controller for the `seguridad` module
 */
class PerfilController extends Controller
{

    public $enableCsrfValidation = false;

    public function actionGetModal()
    {
        $modulo = Opciones::find()->where(["fecha_del" => null])->all();
        $plantilla = Yii::$app->controller->renderPartial("crearPerfil", [
            "modulo" => $modulo
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
                $perfil = new Perfiles();
                $perfil->nombre_perfil = $post['nombre'];
                $perfil->descripcion = $post['descripcion'];
                $perfil->estado = 1;
                $perfil->id_usuario_reg = Yii::$app->user->getId();
                $perfil->fecha_reg = Utils::getFechaActual();
                $perfil->ipmaq_reg = Utils::obtenerIP();

                if (!$perfil->save()) {
                    Utils::show($perfil->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Perfil");
                }

                $modulos = $post['modulo'];

                foreach ($modulos as $m) {
                    $opciones = new PerfilOpcion();
                    $opciones->id_perfil = $perfil->id_perfil;
                    $opciones->id_opcion = $m;
                    $opciones->id_usuario_reg = Yii::$app->user->getId();
                    $opciones->fecha_reg = Utils::getFechaActual();
                    $opciones->ipmaq_reg = Utils::obtenerIP();

                    if (!$opciones->save()) {
                        Utils::show($opciones->getErrors(), true);
                        throw new HttpException("No se puede guardar datos Opciones");
                    }
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($perfil->id_perfil);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionGetModalEdit($id)
    {
        $data = Perfiles::findOne($id);
        $result = [];
        try {
            $command = Yii::$app->db->createCommand('call prefilOpciones(:idPerfil)');
            $command->bindValue(':idPerfil', $id);
            $result = $command->queryAll();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }

        $plantilla = Yii::$app->controller->renderPartial("editarPerfil", [
            "perfil" => $data,
            "modulo" => $result
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
                $perfil = Perfiles::findOne($post['id_perfil']);
                $perfil->nombre_perfil = $post['nombre'];
                $perfil->descripcion = $post['descripcion'];
                $perfil->id_usuario_act = Yii::$app->user->getId();
                $perfil->fecha_act = Utils::getFechaActual();
                $perfil->ipmaq_act = Utils::obtenerIP();

                if (!$perfil->save()) {
                    Utils::show($perfil->getErrors(), true);
                    throw new HttpException("No se puede guardar datos Perfil");
                }

                $modulosEliminar = PerfilOpcion::find()->where(["id_perfil" => $perfil->id_perfil])->all();

                foreach ($modulosEliminar as $m) {
                    $po = PerfilOpcion::findOne($m->id_perfil_opcion);
                    $po->id_usuario_del = Yii::$app->user->getId();
                    $po->fecha_del = Utils::getFechaActual();
                    $po->ipmaq_del = Utils::obtenerIP();

                    if (!$po->save()) {
                        Utils::show($po->getErrors(), true);
                        throw new HttpException("No se puede guardar datos Perfil Opciones");
                    }
                }

                $modulos = $post['modulo'];
                foreach ($modulos as $m) {
                    $opciones = new PerfilOpcion();
                    $opciones->id_perfil = $perfil->id_perfil;
                    $opciones->id_opcion = $m;
                    $opciones->id_usuario_reg = Yii::$app->user->getId();
                    $opciones->fecha_reg = Utils::getFechaActual();
                    $opciones->ipmaq_reg = Utils::obtenerIP();

                    if (!$opciones->save()) {
                        Utils::show($opciones->getErrors(), true);
                        throw new HttpException("No se puede guardar datos Opciones");
                    }
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }

            echo json_encode($perfil->id_perfil);
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
                $perfil = Perfiles::findOne($post['id_perfil']);
                $perfil->id_usuario_del = Yii::$app->user->getId();
                $perfil->fecha_del = Utils::getFechaActual();
                $perfil->ipmaq_del = Utils::obtenerIP();

                if (!$perfil->save()) {
                    Utils::show($perfil->getErrors(), true);
                    throw new HttpException("No se puede eliminar registro perfil");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($perfil->id_perfil);
        } else {
            throw new HttpException(404, 'The requested Item could not be found.');
        }
    }

    public function actionEstado()
    {
        if (Yii::$app->request->post()) {
            $transaction = Yii::$app->db->beginTransaction();
            $post = Yii::$app->request->post();

            try {
                $perfil = Perfiles::findOne($post['id_perfil']);
                $perfil->estado = $post["estado"];
                $perfil->id_usuario_act = Yii::$app->user->getId();
                $perfil->fecha_act = Utils::getFechaActual();
                $perfil->ipmaq_act = Utils::obtenerIP();

                if (!$perfil->save()) {
                    Utils::show($perfil->getErrors(), true);
                    throw new HttpException("No se puede cambiar registro perfil");
                }

                $transaction->commit();
            } catch (Exception $ex) {
                Utils::show($ex, true);
                $transaction->rollback();
            }
            echo json_encode($perfil->id_perfil);
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

        try {
            $command = Yii::$app->db->createCommand('call listadoPerfil(:row,:length,:buscar)');
            $command->bindValue(':row', $page);
            $command->bindValue(':length', $pages);
            $command->bindValue(':buscar', $buscar);
            $result = $command->queryAll();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }

        $data = [];
        foreach ($result as $k => $row) {

            $boton = "";
            if ($row["estado"] == 1) {
                $boton = '<button class="btn btn-icon btn-success btn-circle btn-xs mr-2" onclick="funcionEstadoPerfil(' . $row["id_perfil"] . ',0)">
                                <i class="bi bi-check-circle-fill fs-2"></i>
                          </button>';
            } else {
                $boton = '<button class="btn btn-icon btn-danger btn-circle btn-xs mr-2" onclick="funcionEstadoPerfil(' . $row["id_perfil"] . ',1)">
                                <i class="bi bi-exclamation-circle-fill fs-2"></i>
                          </button>';
            }

            $data[] = [
                "nombre" => $row['nombre_perfil'],
                "descripcion" => $row['descripcion'],
                "estado" => $boton,
                "accion" => '<button class="btn btn-sm btn-light-success font-weight-bold mr-2" onclick="funcionEditarPerfil(' . $row["id_perfil"] . ')"><i class="bi bi-pencil-fill"></i>Editar</button>
                             <button class="btn btn-sm btn-light-danger font-weight-bold mr-2" onclick="funcionEliminarPerfil(' . $row["id_perfil"] . ')"><i class="bi bi-trash-fill"></i>Eliminar</button>',
            ];
        }

        $totalData = isset($result[0]['total']) ? $result[0]['total'] : 0;

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
