<?php

namespace app\modules\listapreventivo\bundles;

use yii\web\AssetBundle;

class ListaPreventivoAsset extends AssetBundle {

    public $sourcePath = '@app/modules/listapreventivo/assets';
    public $css = [
    ];
    public $js = [
        'js/index.js',
        'js/ficha.js',
        'js/informe.js',
    ];
    public $depends = [
        'app\bundles\TemplateAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

}
