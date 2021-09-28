<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use app\bundles\TemplateAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Iniciar sesión';
$this->params['breadcrumbs'][] = $this->title;

$bundle = TemplateAsset::register($this);
?>


<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
    <!--begin::Logo-->
    <!--begin::Heading-->
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-dark mb-3">SISTEMA CONTROL DE REGISTRO DE CONDUCTORES</h1>
        <!--end::Title-->
    </div>
    <!--begin::Heading-->

    <!--end::Logo-->
    <!--begin::Wrapper-->
    <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

        <?php
        $form = ActiveForm::begin([
            'options' => ['class' => 'ng-pristine ng-valid'],
            'fieldConfig' => [
                'template' => "{input}\n{error}",
            ]
        ]);
        ?>

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">Iniciar sesión en CRC</h1>
            <!--end::Title-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">Usuario</label>
            <!--end::Label-->
            <!--begin::Input-->
            <?= $form->field($model, 'usuario')->textInput(['autofocus' => true, 'placeholder' => 'Ingrese usuario o dni', 'class' => 'form-control form-control-lg form-control-solid'])->label(false) ?>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Contraseña</label>
                <!--end::Label-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Input-->
            <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña', 'class' => 'form-control form-control-lg form-control-solid'])->label(false) ?>
            <!--end::Input-->
        </div>

        <div class="fv-row mb-10">
            <?=
            $form->field($model, 'rememberMe')->checkbox([
                'template' => "{input}\n{label}\n{error}",
            ])
            ?>
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <?= Html::submitButton('Ingresar', ['class' => 'btn btn-lg btn-primary w-100 mb-5', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Wrapper-->
</div>


