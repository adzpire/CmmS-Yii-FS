<?php

namespace app\modules\fs\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\fs\models\Linetoken;

/**
 * LinetokenSearch represents the model behind the search form about `app\modules\fs\models\Linetoken`.
 */
class LinetokenSearch extends Linetoken
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['staffID', 'Line_Token'], 'safe'],
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
        $query = Linetoken::find();

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
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'staffID', $this->staffID])
            ->andFilterWhere(['like', 'Line_Token', $this->Line_Token]);

        return $dataProvider;
    }
}
