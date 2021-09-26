<?php

namespace app\modules\encargado\controllers;

use yii\web\Controller;

/**
 * Default controller for the `Encargado` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
     public function actionFormulario()
    {
        return $this->render('formulario');
    }
     public function actionEditar()
    {
        return $this->render('editar');
    }
    
}
