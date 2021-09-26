<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orden_trabajos".
 *
 * @property int $id_orden_trabajo
 * @property int $id_seccion
 * @property int $id_categoria
 * @property int $id_equipo
 * @property string $descripcion
 * @property string $fecha_atencion
 * @property string $descripcion_dianostico
 * @property int $flg_atencion
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
class OrdenTrabajos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orden_trabajos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_seccion', 'id_categoria', 'id_equipo', 'descripcion', 'flg_atencion', 'id_usuario_reg', 'fecha_reg', 'ipmaq_reg'], 'required'],
            [['id_seccion', 'id_categoria', 'id_equipo', 'flg_atencion', 'id_usuario_reg', 'id_usuario_act', 'id_usuario_del'], 'integer'],
            [['fecha_atencion', 'fecha_reg', 'fecha_act', 'fecha_del'], 'safe'],
            [['descripcion'], 'string', 'max' => 250],
            [['descripcion_dianostico'], 'string', 'max' => 254],
            [['ipmaq_reg', 'ipmaq_act', 'ipmaq_del'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_orden_trabajo' => 'Id Orden Trabajo',
            'id_seccion' => 'Id Seccion',
            'id_categoria' => 'Id Categoria',
            'id_equipo' => 'Id Equipo',
            'descripcion' => 'Descripcion',
            'fecha_atencion' => 'Fecha Atencion',
            'descripcion_dianostico' => 'Descripcion Dianostico',
            'flg_atencion' => 'Flg Atencion',
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
