<?php

namespace app\modules\bandeja\bundles;

use yii\web\AssetBundle;

class TecnicoAsset extends AssetBundle {

    public $sourcePath = '@app/modules/bandeja/assets';
    public $css = [
    ];
    public $js = [
        'js/tecnico/index.js',
        'js/tecnico/ficha.js',
        'js/tecnico/informe.js',
    ];
    public $depends = [
        'app\bundles\TemplateAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

}
