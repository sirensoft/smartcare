<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `frontend\models\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'prename', 'name', 'lname', 'birth', 'province', 'district','disease', 'subdistrict', 'village_no', 'village_name', 'house_no','lat','lon', 'dupdate', 'nation', 'region', 'discharge'], 'safe'],
            [['typearea',], 'integer'],
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
        $query = Patient::find();

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
            'birth' => $this->birth,
            'typearea' => $this->typearea,
            //'nation' => $this->nation,
            //'region' => $this->region,
            //'discharge' => $this->discharge,
            'dupdate' => $this->dupdate,
        ]);

        $query->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'prename', $this->prename])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'subdistrict', $this->subdistrict])
            ->andFilterWhere(['like', 'village_no', $this->village_no])
            ->andFilterWhere(['like', 'village_name', $this->village_name])
            ->andFilterWhere(['like', 'house_no', $this->house_no])
            ->andFilterWhere(['like', 'disease', $this->disease]);

        return $dataProvider;
    }
}
