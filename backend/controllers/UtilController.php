<?php
namespace backend\controllers;


use common\components\AppController;



class UtilController extends AppController
{
    public function actionAjaxTime(){
        return date('Y-m-d H:i:s');
    }

}
