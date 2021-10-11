<?php

namespace app\modules\conductor\bundles;

use yii\web\AssetBundle;

class ConductorAsset extends AssetBundle {

    public $sourcePath = '@app/modules/conductor/assets';
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
