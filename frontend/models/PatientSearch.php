<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Patient;
use common\components\MyHelper;

/**
 * PatientSearch represents the model behind the search form about `frontend\models\Patient`.
 */
class PatientSearch extends Patient {

    public $user;
    public $is_discharge=0;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['next_visit_date','user','is_discharge'], 'safe'],
            [['discharge_note','mstatus','religion','color', 'cousin', 'tel', 'pid', 'refer_from', 'class_name', 'adl', 'tai', 'cid', 'prename', 'name', 'lname', 'birth', 'province', 'district', 'disease', 'subdistrict', 'village_no', 'village_name', 'house_no', 'lat', 'lon', 'dupdate', 'nation', 'race', 'hospcode', 'discharge','discharge_date', 'cm_id', 'cg_id'], 'safe'],
            [['typearea', 'class_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = Patient::find();
        if($this->is_discharge===1){
          $query->where('discharge != :d', ['d'=>9]);
        }
        $query->joinWith(['user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>[
                'pageSize'=>30
            ]
        ]);

        $dataProvider->sort->attributes['user'] = [
            'asc' => ['user.u_name' => SORT_ASC],
            'desc' => ['user.u_name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'hospcode'=>  $this->hospcode,
            'birth' => $this->birth,
            'typearea' => $this->typearea,
            'nation' => $this->nation,
            'race' => $this->race,
            'discharge' => $this->discharge,
            'discharge_date' => $this->discharge_date,
            'dupdate' => $this->dupdate,
            'cm_id' => $this->cm_id,
            //'cg_id' => $this->cg_id,
            'adl' => $this->adl,
            'class_id' => $this->class_id,
            'pid' => $this->pid,
            'next_visit_date'=>  $this->next_visit_date
                //'color'=>  $this->color
        ]);

        $query->andFilterWhere(['like', 'cid', $this->cid])
                ->andFilterWhere(['like', 'prename', $this->prename])
                ->andFilterWhere(['like', 'concat(name," ",lname)', $this->name])
                //->andFilterWhere(['like', 'lname', $this->lname])
                //->andFilterWhere(['like', 'hospcode', $this->hospcode])
                ->andFilterWhere(['like', 'refer_from', $this->refer_from])
                ->andFilterWhere(['like', 'province', $this->province])
                ->andFilterWhere(['like', 'district', $this->district])
                ->andFilterWhere(['like', 'subdistrict', $this->subdistrict])
                ->andFilterWhere(['like', 'village_no', $this->village_no])
                ->andFilterWhere(['like', 'village_name', $this->village_name])
                ->andFilterWhere(['like', 'house_no', $this->house_no])
                ->andFilterWhere(['like', 'tai', $this->tai])
                ->andFilterWhere(['like', 'class_name', $this->class_name])
                ->andFilterWhere(['like', 'disease', $this->disease])
                ->andFilterWhere(['like', 'color', $this->color])
                ->andFilterWhere(['like','discharge_note',$this->discharge_note]);
      
        if(MyHelper::isCg()){
            $query->andFilterWhere(['cg_id' => $this->cg_id]);
        }else{
            $query->andFilterWhere(['like', 'user.u_name', $this->cg_id]);
        }

        return $dataProvider;
    }

}
