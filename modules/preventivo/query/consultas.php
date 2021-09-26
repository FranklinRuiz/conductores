<?php

namespace app\modules\preventivo\query;

use Yii;

class consultas {

    public static function listaEquiposPreventivo($n) {
        $result = [];
        try {
            $command = Yii::$app->db->createCommand('call preventivo(:n)');
            $command->bindValue(':n', $n);
            $result = $command->queryAll();
        } catch (\Exception $e) {
            echo "Error al ejecutar procedimiento" . $e;
        }
        return $result;
    }

    public static function listaPreventivo($n) {
        $result = [];
        try {
            $command = Yii::$app->db->createCommand('call listaPreventivo(:mes)');
            $command->bindValue(':mes', $n);
            $result = $command->queryAll();
        } catch (\Exception $e) {
            echo "Error al ejecutar preventivo" . $e;
        }
        return $result;
    }

}
