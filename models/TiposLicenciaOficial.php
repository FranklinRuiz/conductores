<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_licencia_oficial".
 *
 * @property int $id_tipo_licencia_oficial
 * @property string $nombre_licencia
 * @property string $descripcion_licencia
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
class TiposLicenciaOficial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipos_licencia_oficial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_licencia', 'id_usuario_reg', 'fecha_reg', 'ipmaq_reg'], 'required'],
            [['id_usuario_reg', 'id_usuario_act', 'id_usuario_del'], 'integer'],
            [['fecha_reg', 'fecha_act', 'fecha_del'], 'safe'],
            [['nombre_licencia'], 'string', 'max' => 100],
            [['descripcion_licencia'], 'string', 'max' => 255],
            [['ipmaq_reg', 'ipmaq_act', 'ipmaq_del'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_licencia_oficial' => 'Id Tipo Licencia Oficial',
            'nombre_licencia' => 'Nombre Licencia',
            'descripcion_licencia' => 'Descripcion Licencia',
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
        return $this->hasMany(Conductores::className(), ['id_tipo_licencia_oficial' => 'id_tipo_licencia_oficial']);
    }
}
