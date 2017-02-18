<?php

namespace frontend\modules\patient\controllers;

use common\components\AppController;
use common\components\MyHelper;

class ChartController  extends AppController {
   
    public function actionIndex($pid){
        $this->layout = 'main';
        return $this->render('index',[
            'pid'=>$pid
        ]);
    }
}
