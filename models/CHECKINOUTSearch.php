<?php

namespace app\modules\fs\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\fs\models\CHECKINOUT;

/**
 * CHECKINOUTSearch represents the model behind the search form about `app\modules\fs\models\CHECKINOUT`.
 */
class CHECKINOUTSearch extends CHECKINOUT
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Badgenumber', 'CHECKTIME', 'CHECKTYPE', 'VERIFYCODE', 'SENSORID', 'WorkCode', 'sn'], 'safe'],
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
        $query = CHECKINOUT::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
				'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
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
            'CHECKTIME' => $this->CHECKTIME,
        ]);

        $query->andFilterWhere(['like', 'Badgenumber', $this->Badgenumber])
            ->andFilterWhere(['like', 'CHECKTYPE', $this->CHECKTYPE])
            ->andFilterWhere(['like', 'VERIFYCODE', $this->VERIFYCODE])
            ->andFilterWhere(['like', 'SENSORID', $this->SENSORID])
            ->andFilterWhere(['like', 'WorkCode', $this->WorkCode])
            ->andFilterWhere(['like', 'sn', $this->sn]);

        return $dataProvider;
    }
}
