<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estados_verificacion".
 *
 * @property int $id_estado_verificacion
 * @property string $nombre_estado
 * @property string $descripcion_estado
 * @property int $id_usuario_reg
 * @property string $fecha_reg
 * @property string $ipmaq_reg
 * @property int $id_usuario_act
 * @property string $fecha_act
 * @property string $ipmaq_act
 * @property int $id_usuario_del
 * @property string $fecha_del
 * @property string $ipmaq_del
 *
 * @property Conductores[] $conductores
 */
class EstadosVerificacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estados_verificacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_estado', 'id_usuario_reg', 'fecha_reg', 'ipmaq_reg'], 'required'],
            [['id_usuario_reg', 'id_usuario_act', 'id_usuario_del'], 'integer'],
            [['fecha_reg', 'fecha_act', 'fecha_del'], 'safe'],
            [['nombre_estado'], 'string', 'max' => 100],
            [['descripcion_estado'], 'string', 'max' => 255],
            [['ipmaq_reg', 'ipmaq_act', 'ipmaq_del'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estado_verificacion' => 'Id Estado Verificacion',
            'nombre_estado' => 'Nombre Estado',
            'descripcion_estado' => 'Descripcion Estado',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConductores()
    {
        return $this->hasMany(Conductores::className(), ['id_estado_verificacion' => 'id_estado_verificacion']);
    }
}
