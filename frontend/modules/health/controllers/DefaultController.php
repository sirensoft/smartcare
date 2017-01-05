<?php

namespace frontend\modules\health\controllers;

use common\components\AppController;

/**
 * Default controller for the `health` module
 */
class DefaultController extends AppController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($pid)
    {
        return $this->render('index',[
            'pid'=>$pid
        ]);
    }
}
