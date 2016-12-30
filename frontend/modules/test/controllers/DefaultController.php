<?php

namespace frontend\modules\test\controllers;

use common\components\AppController;
use common\components\MyHelper;
use yii2mod\query\ArrayQuery;

/**
 * Default controller for the `test` module
 */
class DefaultController extends AppController {

    protected function line_notify($message = NULL) {

        $LINE_API = MyHelper::getLineApi();

        //$LINE_TOKEN = "A6uGXrGHEeyzqG5icjivxTaDd3Mg8zELQGAML9hY7vm"; //dhdc
        $LINE_TOKEN = "fKKFpR6m65Nr8AzUwOAdJWZJAz5kXPN0NkM40E5z2GM"; // cm

        $queryData = ['message' => $message];
        $queryData = http_build_query($queryData, '', '&');
        $headerOptions = [
            'http' => [
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $LINE_TOKEN . "\r\n"
                . "Content-Length: " . strlen($queryData) . "\r\n",
                'content' => $queryData
            ]
        ];
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($LINE_API, FALSE, $context);
        //$res = json_decode($result);
        return $result;
    }

    function actionIndex() {
        $d = "เมื่อสักครู่...นางกัณหา วิริยขิตกุล ได้รับการดูแล ";
        $res = $this->line_notify($d);
        return $this->render('index', [
                    'res' => $res
        ]);
    }

    public function actionCal() {
        return $this->render('cal');
    }

    public function actionJson($id=NULL) {
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

}
