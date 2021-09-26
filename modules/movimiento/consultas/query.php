<?php

namespace app\modules\movimiento\consultas;
use Yii;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class query {

    public static function getEquipo() {
        $command = Yii::$app->db->createCommand("select id_equipo,
            concat('E-',LPAD(id_equipo, 5, '0'),'::',nombre_equipo)nombre_equipo
            from equipos
            where id_equipo not in (select id_equipo from movimientos) and fecha_del is null");
        $result = $command->queryAll();
        return $result;
    }

}
