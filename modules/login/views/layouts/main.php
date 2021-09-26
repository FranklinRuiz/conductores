<?php
/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use app\bundles\TemplateAsset;

$bundle = TemplateAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body id="kt_body" class="bg-body">
<?php $this->beginBody() ?>
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
         style="background-image: url(<?php echo $bundle->baseUrl ?>/media/illustrations/sketchy-1/14.png">
        <!--begin::Content-->
        <?= $content ?>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Main-->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
