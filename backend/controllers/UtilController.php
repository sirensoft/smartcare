<?php
namespace backend\controllers;


use common\components\AppController;



class UtilController extends AppController
{
    public function actionAjaxTime(){
        return date('Y-m-d H:i:s');
    }
    
    public function actionLastJobTime(){
        $sql = " SELECT t.job_datetime FROM system_job_log t ORDER BY t.job_datetime DESC LIMIT 1 ";
        $raw = \Yii::$app->db->createCommand($sql)->queryScalar();
        return $raw;
    }
    public function actionMysql(){
        return $this->render('mysql');
    }

}
