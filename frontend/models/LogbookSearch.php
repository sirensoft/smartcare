<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Logbook;

/**
 * LogbookSearch represents the model behind the search form about `frontend\models\Logbook`.
 */
class LogbookSearch extends Logbook
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'patient_id', 'cg_id', 'cm_id'], 'integer'],
            [['cc', 'pi', 'fh', 'ph', 'mh', 'nu', 'he', 'sh', 'pe', 'me', 'pl', 'pm', 'co', 'd_update'], 'safe'],
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
        $query = Logbook::find();

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
            'patient_id' => $this->patient_id,
            'cg_id' => $this->cg_id,
            'cm_id' => $this->cm_id,
            'd_update' => $this->d_update,
        ]);

        $query->andFilterWhere(['like', 'cc', $this->cc])
            ->andFilterWhere(['like', 'pi', $this->pi])
            ->andFilterWhere(['like', 'fh', $this->fh])
            ->andFilterWhere(['like', 'ph', $this->ph])
            ->andFilterWhere(['like', 'mh', $this->mh])
            ->andFilterWhere(['like', 'nu', $this->nu])
            ->andFilterWhere(['like', 'he', $this->he])
            ->andFilterWhere(['like', 'sh', $this->sh])
            ->andFilterWhere(['like', 'pe', $this->pe])
            ->andFilterWhere(['like', 'me', $this->me])
            ->andFilterWhere(['like', 'pl', $this->pl])
            ->andFilterWhere(['like', 'pm', $this->pm])
            ->andFilterWhere(['like', 'co', $this->co]);

        return $dataProvider;
    }
}
