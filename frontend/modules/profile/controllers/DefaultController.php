<?php

namespace frontend\modules\profile\controllers;

use common\components\AppController;
use common\models\User;

/**
 * Default controller for the `profile` module
 */
class DefaultController extends AppController {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionView($id) {
        
        //$this->layout = '@frontend/views/layouts/main2';
        $model = User::findOne($id);
        return $this->render('view', [
                    'model' => $model
        ]);
    }

}
