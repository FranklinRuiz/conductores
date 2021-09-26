<?php

namespace app\modules\bandeja\bundles;

use yii\web\AssetBundle;

class BandejaAsset extends AssetBundle {

    public $sourcePath = '@app/modules/bandeja/assets';
    public $css = [
    ];
    public $js = [
        'js/index.js',
        'js/derivar.js',
    ];
    public $depends = [
        'app\bundles\TemplateAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

}
