<?php

namespace frontend\modules\aging\models;

use yii\base\Model;
use yii2mod\query\ArrayQuery;
use yii\data\ArrayDataProvider;
use common\components\MyHelper;

class RptAging extends Model {

    public $sex, $cid, $name, $lname, $moo,$tmb, $adl_code, $dm_risk, $ht_risk, $cvd_res,$hospcode;

    public function rules() {
        return [
            [['sex', 'cid', 'name', 'lname', 'moo','tmb', 'adl_code', 'dm_risk', 'ht_risk', 'cvd_res','hospcode'], 'safe']
        ];
    }

    public function search($params = null) {
        
        $hospcode = MyHelper::getUserOffice();


        $sql = " SELECT t.HOSPCODE hospcode,
p.CID cid ,pn.prename,p.`NAME` 'name',p.LNAME 'lname',p.SEX sex,p.age_y age
,p.addr
,RIGHT(p.vhid,2) moo
,LEFT(p.vhid,6) tmb

,ch.changwatname prov_name
,am.ampurname amp_name
,tm.tambonname tmb_name

,t.adl_date,t.adl_code
,t.ht_date,t.ht_risk
,t.dm_date,t.dm_risk
,t.cvd_score
,CASE 
WHEN t.cvd_score >0 AND t.cvd_score <10 THEN '1'  
WHEN t.cvd_score >=10 AND t.cvd_score < 20 THEN '2' 
WHEN t.cvd_score >=20 AND t.cvd_score < 30 THEN '3' 
WHEN t.cvd_score >=30 AND t.cvd_score < 40 THEN '4' 
WHEN t.cvd_score >=40 THEN '5' 
END as 'cvd_res'
,t.dent_date,t.dent_code
,t.amt_date,t.amt_code
,t.2q_date,t.2q_code
,t.knee_date,t.knee_code
,t.fall_date,t.fall_code
,t.bmi_date,t.bmi
,GROUP_CONCAT(tc.diagcode) dx


FROM t_aged t INNER JOIN t_person_cid p ON t.cid=p.cid
LEFT JOIN chospital_amp h on t.HOSPCODE = h.hoscode
LEFT JOIN cprename pn on pn.id_prename = p.PRENAME
LEFT JOIN cchangwat ch ON ch.changwatcode = LEFT(p.vhid,2)
LEFT JOIN campur am ON am.ampurcodefull = LEFT(p.vhid,4)
LEFT JOIN ctambon tm ON tm.tamboncodefull = LEFT(p.vhid,6)
LEFT JOIN t_chronic tc on tc.cid = t.cid

WHERE p.check_typearea in(1,3) AND p.NATION in(99) AND p.DISCHARGE in(9) AND LENGTH(TRIM(p.CID)) = 13
AND p.age_y >= 60 AND p.age_y < 200 ";  

if(MyHelper::getUserRole()=='12'){
    $sql.= "AND concat(h.provcode,h.distcode) = '$hospcode' ";
}else{    
    $sql.=" AND h.hoscode = '$hospcode' ";
}
$sql.=" GROUP BY t.cid ";



        $models = \Yii::$app->db_hdc->createCommand($sql)->queryAll();

        $query = new ArrayQuery();

        $query->from($models);

        if ($this->load($params) && $this->validate()) {
            $query->andFilterWhere(['like', 'cid', $this->cid]);
            $query->andFilterWhere(['like', 'name', $this->name]);
            $query->andFilterWhere(['like', 'lname', $this->lname]);
            $query->andFilterWhere(['moo' => $this->moo]);
            $query->andFilterWhere(['tmb' => $this->tmb]);
            $query->andFilterWhere(['adl_code' => $this->adl_code]);
            $query->andFilterWhere(['dm_risk' => $this->dm_risk]);
            $query->andFilterWhere(['ht_risk' => $this->ht_risk]);
            $query->andFilterWhere(['cvd_res' => $this->cvd_res]);
            //$query->andFilterWhere(['amt_code' => $this->amt_code]);
            $query->andFilterWhere(['sex' => $this->sex]);
            $query->andFilterWhere(['hospcode' => $this->hospcode]);
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
