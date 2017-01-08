<?php

namespace frontend\modules\map\controllers;

use common\components\AppController;

/**
 * Default controller for the `map` module
 */
class DefaultController extends AppController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
       
        $this->layout = 'main';
         $this->permitRole([1,2]);
        return $this->render('index');
    }
}
