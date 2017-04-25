<?php

namespace frontend\modules\care\controllers;

use yii\web\Controller;

/**
 * Default controller for the `care` module
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
    public function actionItems(){
        $this->layout = 'main';
        return $this->render('items');
    }
}
