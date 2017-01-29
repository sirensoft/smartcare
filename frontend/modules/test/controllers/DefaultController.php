<?php

namespace frontend\modules\test\controllers;

use common\components\AppController;
use common\components\MyHelper;
use yii2mod\query\ArrayQuery;
use frontend\models\CTemplate;

/**
 * Default controller for the `test` module
 */
class DefaultController extends AppController {

    function actionIndex() {
        $d = "เมื่อสักครู่...นางกัณหา วิริยขิตกุล ได้รับการดูแล ";
        $res = MyHelper::sendLineNotify($d);
        return $this->render('index', [
                    'res' => $res
        ]);
    }

    public function actionCal() {
        return $this->render('cal');
    }

    public function actionJson($id = NULL) {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $person = [];
        $person[] = [
            'id' => 1,
            'name' => 'Mr.A',
            'age' => 35
        ];

        $person[] = [
            'id' => 2,
            'name' => 'Mr.B',
            'age' => 15
        ];

        $query = new ArrayQuery();
        $query->from($person);
        $query->where(['id' => $id]);
        $rows = $query->all();


        $data = [
            'records' => $rows
        ];


        //return json_encode($data);
        return json_encode($rows);
    }

    public function actionExcel() {

        $filePath = "./excel/plan.xls";
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load($filePath);

        $a1 = "ชื่อผู้สูงวัย: " . MyHelper::getVersion();
        $a2= CTemplate::findOne(1)->templat_text;
        $objPHPExcel->getActiveSheet()->setCellValue('A1', $a1);
         $objPHPExcel->getActiveSheet()->setCellValue('A2', $a2);
         $objPHPExcel->getActiveSheet()->setCellValue('B2', $a2);



        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save($filePath);


        \Yii::$app->response->sendFile($filePath, "plan.xls");
    }

    public function actionDay() {
        $date = date("Y-m-d");
        echo date('d', strtotime($date));
    }
    
    public function actionGetRoute(){
       $route=\Yii::$app->urlManager->parseRequest(\Yii::$app->request);
       echo $route[0];
        echo "<br>";
        echo $this->getRoute();
    }

}
