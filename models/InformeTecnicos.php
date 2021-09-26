<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "informe_tecnicos".
 *
 * @property int $id_informe_tecnico
 * @property int $id_orden_trabajo
 * @property int $id_archivo
 * @property string $descripcion_falla
 * @property string $diagnostico
 * @property string $recomendaciones
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
class InformeTecnicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'informe_tecnicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_orden_trabajo', 'id_archivo', 'descripcion_falla', 'diagnostico', 'recomendaciones', 'id_usuario_reg', 'fecha_reg', 'ipmaq_reg'], 'required'],
            [['id_orden_trabajo', 'id_archivo', 'id_usuario_reg', 'id_usuario_act', 'id_usuario_del'], 'integer'],
            [['fecha_reg', 'fecha_act', 'fecha_del'], 'safe'],
            [['descripcion_falla'], 'string', 'max' => 150],
            [['diagnostico', 'recomendaciones'], 'string', 'max' => 200],
            [['ipmaq_reg', 'ipmaq_act', 'ipmaq_del'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_informe_tecnico' => 'Id Informe Tecnico',
            'id_orden_trabajo' => 'Id Orden Trabajo',
            'id_archivo' => 'Id Archivo',
            'descripcion_falla' => 'Descripcion Falla',
            'diagnostico' => 'Diagnostico',
            'recomendaciones' => 'Recomendaciones',
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
