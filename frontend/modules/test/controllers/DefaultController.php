<?php

namespace frontend\modules\test\controllers;

use common\components\AppController;
use common\components\MyHelper;
use yii2mod\query\ArrayQuery;

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
        
        //echo date('H:i:s');
        $filePath = "./excel/test.xls";
        
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        $objPHPExcel = $objReader->load($filePath);
                
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'sss');
        
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save($filePath);
        
        //echo "save";
        \Yii::$app->response->sendFile($filePath);
        
    }

}
