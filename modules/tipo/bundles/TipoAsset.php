<?php

namespace app\modules\tipo\bundles;

use yii\web\AssetBundle;

class TipoAsset extends AssetBundle {

    public $sourcePath = '@app/modules/tipo/assets';
    public $css = [
    ];
    public $js = [
        'js/index.js',
        'js/crear.js',
        'js/editar.js',
        'js/eliminar.js',
    ];
    public $depends = [
        'app\bundles\TemplateAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

}
