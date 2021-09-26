<?php

namespace app\modules\movimiento\bundles;

use yii\web\AssetBundle;

class MovimientoAsset extends AssetBundle {

    public $sourcePath = '@app/modules/movimiento/assets';
    public $css = [
    ];
    public $js = [
        'js/index.js',
        'js/crear.js',
        'js/mover.js',
    ];
    public $depends = [
        'app\bundles\TemplateAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

}
