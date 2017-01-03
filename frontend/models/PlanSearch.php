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
            [['id'], 'integer'],
            [['is_done','patient_id', 'title', 'start_date', 'start_time', 'end_date', 'end_time', 'color', 'bg_color', 'border_color', 'text_color', 'provider_id', 'care_date', 'care_time', 'weight', 'height', 'pulse', 'temp', 'sbp', 'dbp', 'rr', 'sugar', 'note', 'd_create', 'd_update'], 'safe'],
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
            'start_date' => $this->start_date,
            'start_time' => $this->start_time,
            'end_date' => $this->end_date,
            'end_time' => $this->end_time,
            'care_date' => $this->care_date,
            'care_time' => $this->care_time,
            'is_done'=>  $this->is_done,
            'd_create' => $this->d_create,
            'd_update' => $this->d_update,
        ]);

        $query->andFilterWhere(['like', 'patient_id', $this->patient_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'bg_color', $this->bg_color])
            ->andFilterWhere(['like', 'border_color', $this->border_color])
            ->andFilterWhere(['like', 'text_color', $this->text_color])
            ->andFilterWhere(['like', 'provider_id', $this->provider_id])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'height', $this->height])
            ->andFilterWhere(['like', 'pulse', $this->pulse])
            ->andFilterWhere(['like', 'temp', $this->temp])
            ->andFilterWhere(['like', 'sbp', $this->sbp])
            ->andFilterWhere(['like', 'dbp', $this->dbp])
            ->andFilterWhere(['like', 'rr', $this->rr])
            ->andFilterWhere(['like', 'sugar', $this->sugar])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
