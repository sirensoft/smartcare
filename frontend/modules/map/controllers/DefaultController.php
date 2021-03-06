<?php

namespace frontend\modules\map\controllers;

use common\components\AppController;
use common\components\MyHelper;

/**
 * Default controller for the `map` module
 */
class DefaultController extends AppController {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {

        $hos = MyHelper::getUserOffice();
        $this->layout = 'main';
        $this->permitRole([1, 2,4,10]);

        //ไม่ discharge
        $sql = " SELECT t.`name`,t.lname,t.age_y,t.color rapid,t.tai,t.color,t.class_name,t.lat,t.lon FROM patient t
                WHERE t.hospcode = '$hos' AND t.discharge=9 AND t.lat > '1' ";
        
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();

        $pt_json = [];
        foreach ($raw as $value) {
            $pt_json[] = [
                'type' => 'Feature',
                'properties' => [
                    'NAME' => $value['name'] . ' ' . $value['lname'] . '(' . $value['age_y'] . 'ปี) ' . $value['class_name'],
                    'TAI' => $value['tai'],
                    'RAPID' => $value['rapid'],
                    'SEARCH_TEXT' => $value['name'] . ' ' . $value['lname'],
                    
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$value['lon'] * 1, $value['lat'] * 1],
                ]
            ];
        }
        $pt_json = json_encode($pt_json);
        
        // เคส discharge        
         $sql = " SELECT t.`name`,t.lname,t.age_y,t.discharge,t.tai,t.color,t.class_name,t.lat,t.lon FROM patient t
                WHERE t.hospcode = '$hos' AND t.discharge<>9 AND t.lat > '1' ";
        
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();

        $pt_json_disc = [];
        foreach ($raw as $value) {
            $pt_json_disc[] = [
                'type' => 'Feature',
                'properties' => [
                    'NAME' => $value['name'] . ' ' . $value['lname'] . '(' . $value['age_y'] . 'ปี) ' . $value['class_name'],
                    'TAI' => $value['tai'],
                    'RAPID' => $value['discharge']==1?'black':'white',
                    'SEARCH_TEXT' => $value['name'] . ' ' . $value['lname'],
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$value['lon'] * 1, $value['lat'] * 1],
                ]
            ];
        }
        $pt_json_disc = json_encode($pt_json_disc);
        
        

        return $this->render('index', [
                    'pt_json' => $pt_json,
                    'pt_json_disc'=>$pt_json_disc
        ]);
    }
    
    public function actionTest(){
        return $this->render('test');
    }

}
