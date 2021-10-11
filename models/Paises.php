<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paises".
 *
 * @property int $id_pais
 * @property string $nombre_pais
 * @property int $estado
 *
 * @property Conductores[] $conductores
 */
class Paises extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paises';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_pais', 'estado'], 'required'],
            [['estado'], 'integer'],
            [['nombre_pais'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pais' => 'Id Pais',
            'nombre_pais' => 'Nombre Pais',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConductores()
    {
        return $this->hasMany(Conductores::className(), ['id_pais' => 'id_pais']);
    }
}
