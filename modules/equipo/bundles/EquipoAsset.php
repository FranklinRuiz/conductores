<?php

namespace app\modules\equipo\bundles;

use yii\web\AssetBundle;

class EquipoAsset extends AssetBundle {

    public $sourcePath = '@app/modules/equipo/assets';
    public $css = [
    ];
    public $js = [
        'js/index.js',
        'js/crear.js',
        'js/editar.js',
        'js/eliminar.js',
        'js/ficha.js',
    ];
    public $depends = [
        'app\bundles\TemplateAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

}
