<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prueba".
 *
 * @property int $id_prueba
 * @property string $nombre
 */
class Prueba extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prueba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prueba'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prueba' => 'Id Prueba',
            'nombre' => 'Nombre',
        ];
    }
}
