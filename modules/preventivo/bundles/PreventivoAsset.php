<?php

namespace app\modules\preventivo\bundles;

use yii\web\AssetBundle;

class PreventivoAsset extends AssetBundle {

    public $sourcePath = '@app/modules/preventivo/assets';
    public $css = [
    ];
    public $js = [
        'js/index.js',
    ];
    public $depends = [
        'app\bundles\TemplateAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

}
