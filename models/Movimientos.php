<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimientos".
 *
 * @property int $id_movimiento
 * @property int $id_equipo
 * @property int $id_seccion
 * @property int $id_estado
 * @property int $id_usuario_reg
 * @property string $fecha_reg
 * @property string $ipmaq_reg
 * @property int $id_usuario_act
 * @property string $fecha_act
 * @property string $ipmaq_act
 * @property int $id_usuario_del
 * @property string $fecha_del
 * @property string $ipmaq_del
 * @property int $flg_activo
 */
class Movimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movimientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_equipo', 'id_seccion', 'id_estado', 'id_usuario_reg', 'fecha_reg', 'ipmaq_reg', 'flg_activo'], 'required'],
            [['id_equipo', 'id_seccion', 'id_estado', 'id_usuario_reg', 'id_usuario_act', 'id_usuario_del', 'flg_activo'], 'integer'],
            [['fecha_reg', 'fecha_act', 'fecha_del'], 'safe'],
            [['ipmaq_reg', 'ipmaq_act', 'ipmaq_del'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_movimiento' => 'Id Movimiento',
            'id_equipo' => 'Id Equipo',
            'id_seccion' => 'Id Seccion',
            'id_estado' => 'Id Estado',
            'id_usuario_reg' => 'Id Usuario Reg',
            'fecha_reg' => 'Fecha Reg',
            'ipmaq_reg' => 'Ipmaq Reg',
            'id_usuario_act' => 'Id Usuario Act',
            'fecha_act' => 'Fecha Act',
            'ipmaq_act' => 'Ipmaq Act',
            'id_usuario_del' => 'Id Usuario Del',
            'fecha_del' => 'Fecha Del',
            'ipmaq_del' => 'Ipmaq Del',
            'flg_activo' => 'Flg Activo',
        ];
    }
}
