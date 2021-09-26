<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ficha_tecnicas".
 *
 * @property int $id_ficha_tecnica
 * @property string $fabricante
 * @property string $fecha_fabricacion
 * @property string $marca
 * @property string $modelo
 * @property string $serie
 * @property string $vida_util
 * @property string $descripcion_tecnica
 * @property string $fecha_activacion
 * @property int $id_usuario_reg
 * @property string $fecha_reg
 * @property string $ipmaq_reg
 * @property int $id_usuario_act
 * @property string $fecha_act
 * @property string $ipmaq_act
 * @property int $id_usuario_del
 * @property string $fecha_del
 * @property string $ipmaq_del
 * @property int $id_equipo
 */
class FichaTecnicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ficha_tecnicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fabricante', 'marca', 'modelo', 'serie', 'vida_util', 'fecha_activacion', 'fecha_reg', 'id_equipo'], 'required'],
            [['fecha_fabricacion', 'fecha_activacion', 'fecha_reg', 'fecha_act', 'fecha_del'], 'safe'],
            [['id_usuario_reg', 'id_usuario_act', 'id_usuario_del', 'id_equipo'], 'integer'],
            [['fabricante', 'marca', 'modelo', 'serie', 'vida_util'], 'string', 'max' => 50],
            [['descripcion_tecnica'], 'string', 'max' => 200],
            [['ipmaq_reg', 'ipmaq_act', 'ipmaq_del'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ficha_tecnica' => 'Id Ficha Tecnica',
            'fabricante' => 'Fabricante',
            'fecha_fabricacion' => 'Fecha Fabricacion',
            'marca' => 'Marca',
            'modelo' => 'Modelo',
            'serie' => 'Serie',
            'vida_util' => 'Vida Util',
            'descripcion_tecnica' => 'Descripcion Tecnica',
            'fecha_activacion' => 'Fecha Activacion',
            'id_usuario_reg' => 'Id Usuario Reg',
            'fecha_reg' => 'Fecha Reg',
            'ipmaq_reg' => 'Ipmaq Reg',
            'id_usuario_act' => 'Id Usuario Act',
            'fecha_act' => 'Fecha Act',
            'ipmaq_act' => 'Ipmaq Act',
            'id_usuario_del' => 'Id Usuario Del',
            'fecha_del' => 'Fecha Del',
            'ipmaq_del' => 'Ipmaq Del',
            'id_equipo' => 'Id Equipo',
        ];
    }
}
