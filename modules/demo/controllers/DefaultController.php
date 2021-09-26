<?php

namespace app\modules\demo\controllers;

use yii\web\Controller;

/**
 * Default controller for the `demo` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $variable = "Franklin Asto";
        return $this->render('index', [
                    "v" => $variable
        ]);
    }

}
