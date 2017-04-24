<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Club;

/**
 * ClubSearch represents the model behind the search form about `frontend\models\Club`.
 */
class ClubSearch extends Club
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'member'], 'integer'],
            [['name', 'addr', 'date_begin', 'date_end', 'status', 'register_no', 'hospcode', 'note'], 'safe'],
            [['budget'], 'number'],
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
        $query = Club::find();

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
            'date_begin' => $this->date_begin,
            'date_end' => $this->date_end,
            'member' => $this->member,
            'budget' => $this->budget,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'addr', $this->addr])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'register_no', $this->register_no])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
