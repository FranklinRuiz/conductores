<?php

namespace app\modules\dashboard\bundles;

use yii\web\AssetBundle;

class DashboardAsset extends AssetBundle {

    public $sourcePath = '@app/modules/dashboard/assets';
    public $css = [
    ];
    public $js = [
        'https://cdn.amcharts.com/lib/4/core.js',
        'https://cdn.amcharts.com/lib/4/charts.js',
        'https://cdn.amcharts.com/lib/4/themes/animated.js',
        'js/grafico.js'
    ];
    public $depends = [
        'app\bundles\TemplateAsset',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

}
