<?php

namespace frontend\modules\meddevice\controllers;

use yii\web\Controller;

/**
 * Default controller for the `meddevice` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //return $this->render('index');
        return $this->redirect(['med-device/index']);
    }
}
