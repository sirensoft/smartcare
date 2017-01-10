<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Plan;

/**
 * PlanSearch represents the model behind the search form about `frontend\models\Plan`.
 */
class PlanSearch extends Plan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'patient_id', 'adl'], 'integer'],
            [['extra_service','hospcode', 'date_create', 'rapid_code', 'adl_text', 'tai', 'tai_text', 'budget_need', 'dx1', 'dx2', 'drug', 'note_before_plan', 'fct_care_time', 'cg_care_time', 'update_plan', 'patient_mind', 'live_problem', 'long_goal', 'short_goal', 'careful', 'd_update'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Plan::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'patient_id' => $this->patient_id,
            'date_create' => $this->date_create,
            'adl' => $this->adl,
            'd_update' => $this->d_update,
        ]);

        $query->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'rapid_code', $this->rapid_code])
            ->andFilterWhere(['like', 'adl_text', $this->adl_text])
            ->andFilterWhere(['like', 'tai', $this->tai])
            ->andFilterWhere(['like', 'tai_text', $this->tai_text])
            ->andFilterWhere(['like', 'budget_need', $this->budget_need])
            ->andFilterWhere(['like', 'dx1', $this->dx1])
            ->andFilterWhere(['like', 'dx2', $this->dx2])
            ->andFilterWhere(['like', 'drug', $this->drug])
            ->andFilterWhere(['like', 'note_before_plan', $this->note_before_plan])
            ->andFilterWhere(['like', 'fct_care_time', $this->fct_care_time])
            ->andFilterWhere(['like', 'cg_care_time', $this->cg_care_time])
            ->andFilterWhere(['like', 'update_plan', $this->update_plan])
            ->andFilterWhere(['like', 'patient_mind', $this->patient_mind])
            ->andFilterWhere(['like', 'live_problem', $this->live_problem])
            ->andFilterWhere(['like', 'long_goal', $this->long_goal])
            ->andFilterWhere(['like', 'short_goal', $this->short_goal])
            ->andFilterWhere(['like', 'careful', $this->careful]);

        return $dataProvider;
    }
}
