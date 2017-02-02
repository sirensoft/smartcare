<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Visit;

/**
 * VisitSearch represents the model behind the search form about `frontend\models\Visit`.
 */
class VisitSearch extends Visit {

    /**
     * @inheritdoc
     */
    public $user;

    public function rules() {
        return [
            [['id', 'plan_week_id', 'patient_id',  'obj_pulse', 'obj_rr', 'obj_adl'], 'integer'],
            [['provider_id','user','hospcode', 'date_visit', 'start_time', 'end_time', 'subjective', 'obj_bp', 'asses_1', 'asses_2', 'asses_3', 'asses_4', 'asses_5', 'asses_6', 'asses_7', 'asses_8', 'asses_9', 'job_result', 'problem', 'next_plan'], 'safe'],
            [['obj_weight', 'obj_heigh', 'obj_bmi', 'obj_temperature'], 'number'],
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
        $query = Visit::find();
        $query->joinWith(['user']);
        

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
             'sort'=> ['defaultOrder' => ['date_visit'=>SORT_DESC]]
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
            'plan_week_id' => $this->plan_week_id,
            'patient_id' => $this->patient_id,
            //'provider_id' => $this->provider_id,
            'date_visit' => $this->date_visit,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'obj_weight' => $this->obj_weight,
            'obj_heigh' => $this->obj_heigh,
            'obj_bmi' => $this->obj_bmi,
            'obj_temperature' => $this->obj_temperature,
            'obj_pulse' => $this->obj_pulse,
            'obj_rr' => $this->obj_rr,
            'obj_adl' => $this->obj_adl,
        ]);

        $query->andFilterWhere(['like', 'hospcode', $this->hospcode])
                ->andFilterWhere(['like', 'subjective', $this->subjective])
                ->andFilterWhere(['like', 'obj_bp', $this->obj_bp])
                ->andFilterWhere(['like', 'asses_1', $this->asses_1])
                ->andFilterWhere(['like', 'asses_2', $this->asses_2])
                ->andFilterWhere(['like', 'asses_3', $this->asses_3])
                ->andFilterWhere(['like', 'asses_4', $this->asses_4])
                ->andFilterWhere(['like', 'asses_5', $this->asses_5])
                ->andFilterWhere(['like', 'asses_6', $this->asses_6])
                ->andFilterWhere(['like', 'asses_7', $this->asses_7])
                ->andFilterWhere(['like', 'asses_8', $this->asses_8])
                ->andFilterWhere(['like', 'asses_9', $this->asses_9])
                ->andFilterWhere(['like', 'job_result', $this->job_result])
                ->andFilterWhere(['like', 'problem', $this->problem])
                ->andFilterWhere(['like', 'next_plan', $this->next_plan]);
        $query->andFilterWhere(['like', 'user.u_name', $this->provider_id]);

        return $dataProvider;
    }

}
