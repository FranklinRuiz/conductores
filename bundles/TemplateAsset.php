<?php

namespace app\bundles;

use yii\web\AssetBundle;

class TemplateAsset extends AssetBundle
{

    public $sourcePath = '@app/assets';
    public $baseUrl = '@web';
    public $css = [
        "plugins/custom/datatables/datatables.bundle.css",
        "plugins/global/plugins.bundle.css",
        "css/style.bundle.css",
    ];
    public $js = [
        "plugins/global/plugins.bundle.js",
        "js/scripts.bundle.js",
        "plugins/custom/datatables/datatables.bundle.js",
        "js/custom/intro.js",
        "js/tabla_general.js",
        'js/bootbox/bootbox.min.js',
        'js/bootbox/bootbox.locales.min.js',
        'js/jquery-validation/dist/jquery.validate.min.js',
        'js/noty.js',
    ];
    public $depends = [
        'app\bundles\AppAsset',
    ];

}
