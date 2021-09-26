<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "preventivos".
 *
 * @property int $id_preventivo
 * @property int $id_equipo
 * @property string $fecha_mantenimiento
 * @property int $id_usuario_asignado
 * @property string $detalle_matenimiento
 * @property string $prioridad
 * @property string $fecha_inicio
 * @property string $fecha_termino
 * @property string $descripcion_trabajo
 * @property int $id_archivo
 * @property string $estado_orden
 * @property int $id_usuario_reg
 * @property string $fecha_reg
 * @property string $ipmaq_reg
 * @property int $id_usuario_act
 * @property string $fecha_act
 * @property string $ipmaq_act
 * @property int $id_usuario_del
 * @property string $fecha_del
 * @property string $ipmaq_del
 */
class Preventivos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'preventivos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_equipo', 'fecha_mantenimiento', 'prioridad', 'estado_orden', 'id_usuario_reg', 'fecha_reg', 'ipmaq_reg'], 'required'],
            [['id_equipo', 'id_usuario_asignado', 'id_archivo', 'id_usuario_reg', 'id_usuario_act', 'id_usuario_del'], 'integer'],
            [['fecha_mantenimiento', 'fecha_inicio', 'fecha_termino', 'fecha_reg', 'fecha_act', 'fecha_del'], 'safe'],
            [['detalle_matenimiento'], 'string', 'max' => 255],
            [['prioridad'], 'string', 'max' => 50],
            [['descripcion_trabajo'], 'string', 'max' => 200],
            [['estado_orden'], 'string', 'max' => 100],
            [['ipmaq_reg', 'ipmaq_act', 'ipmaq_del'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_preventivo' => 'Id Preventivo',
            'id_equipo' => 'Id Equipo',
            'fecha_mantenimiento' => 'Fecha Mantenimiento',
            'id_usuario_asignado' => 'Id Usuario Asignado',
            'detalle_matenimiento' => 'Detalle Matenimiento',
            'prioridad' => 'Prioridad',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_termino' => 'Fecha Termino',
            'descripcion_trabajo' => 'Descripcion Trabajo',
            'id_archivo' => 'Id Archivo',
            'estado_orden' => 'Estado Orden',
            'id_usuario_reg' => 'Id Usuario Reg',
            'fecha_reg' => 'Fecha Reg',
            'ipmaq_reg' => 'Ipmaq Reg',
            'id_usuario_act' => 'Id Usuario Act',
            'fecha_act' => 'Fecha Act',
            'ipmaq_act' => 'Ipmaq Act',
            'id_usuario_del' => 'Id Usuario Del',
            'fecha_del' => 'Fecha Del',
            'ipmaq_del' => 'Ipmaq Del',
        ];
    }
}
