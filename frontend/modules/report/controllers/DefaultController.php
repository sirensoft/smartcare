<?php

namespace frontend\modules\report\controllers;

use common\components\AppController;
use common\components\MyHelper;
use yii\data\ArrayDataProvider;

/**
 * Default controller for the `report` module
 */
class DefaultController extends AppController {

    public function actionCalAdlMonth() {
        
        MyHelper::execSql("CALL set_adl_month;");
        
        for ($id = 1; $id <= 100; $id++) {
            MyHelper::execSql(" CALL add_adl_month($id)");
        }
    }

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

        $sql = " SELECT concat(t.prename,t.`name`,' ',t.lname) 'name',color,t.age_y
,t.class_name ,t.village_no ,t.house_no
,u.u_name 'cg',COUNT(DISTINCT v.date_visit) 'count_visit' 
,MAX(DISTINCT v.date_visit) 'last_visit'
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

    public function actionReport3() {
        $hospcode = MyHelper::getUserOffice();
        $searchModel = new \frontend\modules\report\models\RptAdlMonth($hospcode);

        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);


        return $this->render('report3', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel
        ]);
    }

}
