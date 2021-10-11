<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conductores".
 *
 * @property int $id_conductor
 * @property int $id_persona
 * @property int $id_pais
 * @property string $fecha_emision_licencia_oficial
 * @property string $fecha_vencimiento_licencia_oficial
 * @property string $numero_licencia_oficial
 * @property string $fecha_emision_licencia_interna
 * @property string $fecha_vencimiento_licencia_interna
 * @property string $numero_licencia_interna
 * @property int $id_estado_conductor
 * @property int $id_estado_verificacion
 * @property int $id_tipo_licencia_oficial
 * @property int $id_tipo_licencia_interna
 *
 * @property EstadosConductor $estadoConductor
 * @property EstadosVerificacion $estadoVerificacion
 * @property Paises $pais
 * @property Personas $persona
 * @property TiposLicenciaInterna $tipoLicenciaInterna
 * @property TiposLicenciaOficial $tipoLicenciaOficial
 * @property EvaluacionesConductor[] $evaluacionesConductors
 */
class Conductores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conductores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_persona', 'id_pais', 'fecha_emision_licencia_oficial', 'fecha_vencimiento_licencia_oficial', 'numero_licencia_oficial'], 'required'],
            [['id_persona', 'id_pais', 'id_estado_conductor', 'id_estado_verificacion', 'id_tipo_licencia_oficial', 'id_tipo_licencia_interna'], 'integer'],
            [['fecha_emision_licencia_oficial', 'fecha_vencimiento_licencia_oficial', 'fecha_emision_licencia_interna', 'fecha_vencimiento_licencia_interna'], 'safe'],
            [['numero_licencia_oficial', 'numero_licencia_interna'], 'string', 'max' => 50],
            [['id_estado_conductor'], 'exist', 'skipOnError' => true, 'targetClass' => EstadosConductor::className(), 'targetAttribute' => ['id_estado_conductor' => 'id_estado_conductor']],
            [['id_estado_verificacion'], 'exist', 'skipOnError' => true, 'targetClass' => EstadosVerificacion::className(), 'targetAttribute' => ['id_estado_verificacion' => 'id_estado_verificacion']],
            [['id_pais'], 'exist', 'skipOnError' => true, 'targetClass' => Paises::className(), 'targetAttribute' => ['id_pais' => 'id_pais']],
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_persona' => 'id_persona']],
            [['id_tipo_licencia_interna'], 'exist', 'skipOnError' => true, 'targetClass' => TiposLicenciaInterna::className(), 'targetAttribute' => ['id_tipo_licencia_interna' => 'id_tipo_licencia_interna']],
            [['id_tipo_licencia_oficial'], 'exist', 'skipOnError' => true, 'targetClass' => TiposLicenciaOficial::className(), 'targetAttribute' => ['id_tipo_licencia_oficial' => 'id_tipo_licencia_oficial']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_conductor' => 'Id Conductor',
            'id_persona' => 'Id Persona',
            'id_pais' => 'Id Pais',
            'fecha_emision_licencia_oficial' => 'Fecha Emision Licencia Oficial',
            'fecha_vencimiento_licencia_oficial' => 'Fecha Vencimiento Licencia Oficial',
            'numero_licencia_oficial' => 'Numero Licencia Oficial',
            'fecha_emision_licencia_interna' => 'Fecha Emision Licencia Interna',
            'fecha_vencimiento_licencia_interna' => 'Fecha Vencimiento Licencia Interna',
            'numero_licencia_interna' => 'Numero Licencia Interna',
            'id_estado_conductor' => 'Id Estado Conductor',
            'id_estado_verificacion' => 'Id Estado Verificacion',
            'id_tipo_licencia_oficial' => 'Id Tipo Licencia Oficial',
            'id_tipo_licencia_interna' => 'Id Tipo Licencia Interna',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoConductor()
    {
        return $this->hasOne(EstadosConductor::className(), ['id_estado_conductor' => 'id_estado_conductor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoVerificacion()
    {
        return $this->hasOne(EstadosVerificacion::className(), ['id_estado_verificacion' => 'id_estado_verificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(Paises::className(), ['id_pais' => 'id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Personas::className(), ['id_persona' => 'id_persona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoLicenciaInterna()
    {
        return $this->hasOne(TiposLicenciaInterna::className(), ['id_tipo_licencia_interna' => 'id_tipo_licencia_interna']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoLicenciaOficial()
    {
        return $this->hasOne(TiposLicenciaOficial::className(), ['id_tipo_licencia_oficial' => 'id_tipo_licencia_oficial']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacionesConductors()
    {
        return $this->hasMany(EvaluacionesConductor::className(), ['id_conductor' => 'id_conductor']);
    }
}
