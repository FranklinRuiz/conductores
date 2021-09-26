<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hoja_rutas".
 *
 * @property int $id_hoja_ruta
 * @property int $id_orden_trabajo
 * @property int $id_usuario_origen
 * @property int $id_usuario_destino
 * @property string $comentario
 * @property int $flg_estado
 * @property string $estado
 */
class HojaRutas extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'hoja_rutas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id_orden_trabajo', 'id_usuario_origen', 'estado'], 'required'],
            [['id_orden_trabajo', 'id_usuario_origen', 'id_usuario_destino', 'flg_estado'], 'integer'],
            [['comentario'], 'string', 'max' => 255],
            [['estado'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id_hoja_ruta' => 'Id Hoja Ruta',
            'id_orden_trabajo' => 'Id Orden Trabajo',
            'id_usuario_origen' => 'Id Usuario Origen',
            'id_usuario_destino' => 'Id Usuario Destino',
            'comentario' => 'Comentario',
            'flg_estado' => 'Flg Estado',
            'estado' => 'Estado',
        ];
    }

}
