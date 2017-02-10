<?php

namespace frontend\controllers;
use common\components\AppController;

class UtilityController extends AppController
{
        
    public function actionTime(){
        return date('Y-m-d H:i:s');
    }

}
