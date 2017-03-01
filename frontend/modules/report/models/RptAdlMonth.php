<?php

namespace frontend\modules\report\models;

use yii\base\Model;
use yii2mod\query\ArrayQuery;
use yii\data\ArrayDataProvider;
use common\components\MyHelper;

class RptAdlMonth extends Model {

    public $hospcode, $name, $class_name,$moo;

    public function __construct($hospcode) {
        $this->hospcode = $hospcode;
    }

    public function rules() {
        return [
            [['name', 'hospcode', 'class_name','moo'], 'safe']
        ];
    }

    public function search($params = null) {

        $sql = " SELECT concat(p.prename,p.`name`,' ',p.lname) name
,p.age_y,p.class_name,p.village_no moo,t.*,p.cg_id from adl_month t
INNER JOIN patient p ON p.id = t.patient_id AND p.discharge = 9 
AND p.hospcode = '$this->hospcode' ";
        if (MyHelper::isCg()) {
            $cg_id = MyHelper::getUserId();
            $sql.= " AND p.cg_id = '$cg_id' ";
        }

        $models = \Yii::$app->db->createCommand($sql)->queryAll();
        $query = new ArrayQuery();
        $query->from($models);
        if ($this->load($params) && $this->validate()) {

            $query->andFilterWhere(['like', 'name', $this->name]);
            $query->andFilterWhere(['like', 'class_name', $this->class_name]);
            $query->andFilterWhere([ 'moo'=> $this->moo]);
        }
        $all_models = $query->all();
        if (!empty($all_models[0])) {
            $cols = array_keys($all_models[0]);
        }
        return new ArrayDataProvider([
            'allModels' => $all_models,
            //'totalItems'=>100,
            'sort' => !empty($cols) ? ['attributes' => $cols] : FALSE,
            'pagination' => [
                'pageSize' => 25
            ]
        ]);
    }

//search
    public function attributeLabels() {
        return [
        ];
    }

}
