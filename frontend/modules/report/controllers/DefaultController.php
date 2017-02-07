<?php

namespace frontend\modules\report\controllers;

use common\components\AppController;
use common\components\MyHelper;
use yii\data\ArrayDataProvider;

/**
 * Default controller for the `report` module
 */
class DefaultController extends AppController {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {
        $this->permitRole([1, 2, 3, 4]);
        return $this->render('report1');
    }

    public function actionReport2() {
        $this->permitRole([1, 2, 3, 4]);
        $uid = MyHelper::getUserId();

        $sql = " SELECT concat(t.prename,t.`name`,' ',t.lname) 'ผู้สูงอายุ',t.age_y 'อายุ(ปี)',t.class_name 'กลุ่ม',t.village_no 'หมู่ที่',t.house_no 'บ้านเลขที่'
,u.u_name 'CG',COUNT(DISTINCT v.date_visit) 'เยี่ยมแล้ว(ครั้ง)' 
,MAX(DISTINCT v.date_visit) 'เยียมล่าสุด'
FROM patient t
LEFT JOIN visit v ON v.patient_id = t.id 
LEFT JOIN `user` u on u.id = t.cg_id
WHERE t.discharge=9 ";
        if (MyHelper::isCg()) {
            $sql.="AND t.cg_id = $uid ";
        } else {
            $sql.="AND t.cm_id = $uid ";
        }

        $sql.="GROUP BY t.id ORDER BY t.id ";

        $raw = $this->query_all($sql);
        if (!empty($raw[0])) {
            $cols = array_keys($raw[0]);
        }
        $dataProvider = new ArrayDataProvider([
            'allModels' => $raw,
            'sort' => !empty($cols) ? [ 'attributes' => $cols] : FALSE,
        ]);

        return $this->render('report2', [
                    'dataProvider' => $dataProvider
        ]);
    }

}
