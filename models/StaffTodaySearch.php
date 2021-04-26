<?php

namespace app\modules\fs\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\fs\models\USERINFO;

/**
 * USERINFOSearch represents the model behind the search form about `app\modules\fs\models\USERINFO`.
 */
class StaffTodaySearch extends USERINFO
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERID', 'VERIFICATIONMETHOD', 'DEFAULTDEPTID', 'SECURITYFLAGS', 'ATT', 'INLATE', 'OUTEARLY', 'OVERTIME', 'SEP', 'HOLIDAY', 'LUNCHDURATION', 'privilege', 'InheritDeptSch', 'InheritDeptSchClass', 'AutoSchPlan', 'MinAutoSchInterval', 'RegisterOT', 'InheritDeptRule', 'EMPRIVILEGE'], 'integer'],
            [['Badgenumber', 'SSN', 'Name', 'Gender', 'TITLE', 'PAGER', 'BIRTHDAY', 'HIREDDAY', 'street', 'CITY', 'STATE', 'ZIP', 'OPHONE', 'FPHONE', 'MINZU', 'PASSWORD', 'MVERIFYPASS', 'PHOTO', 'Notes', 'CardNo', 'Pin1'], 'safe'],
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
        $query = USERINFO::find();
		  $query->joinWith(['deptInfo']);
        $query->andWhere(['DEPARTMENTS.DEPTID' => 5]);
		// ลาออกแล้ว
        $query->andWhere(['not in', 'Badgenumber', [40040, 40039, 40031]]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
				'pagination' => false,
				'sort' => [
                'defaultOrder' => [
                    'Name' => SORT_ASC,
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
            'USERID' => $this->USERID,
            'BIRTHDAY' => $this->BIRTHDAY,
            'HIREDDAY' => $this->HIREDDAY,
            'VERIFICATIONMETHOD' => $this->VERIFICATIONMETHOD,
            'DEFAULTDEPTID' => $this->DEFAULTDEPTID,
            'SECURITYFLAGS' => $this->SECURITYFLAGS,
            'ATT' => $this->ATT,
            'INLATE' => $this->INLATE,
            'OUTEARLY' => $this->OUTEARLY,
            'OVERTIME' => $this->OVERTIME,
            'SEP' => $this->SEP,
            'HOLIDAY' => $this->HOLIDAY,
            'LUNCHDURATION' => $this->LUNCHDURATION,
            'privilege' => $this->privilege,
            'InheritDeptSch' => $this->InheritDeptSch,
            'InheritDeptSchClass' => $this->InheritDeptSchClass,
            'AutoSchPlan' => $this->AutoSchPlan,
            'MinAutoSchInterval' => $this->MinAutoSchInterval,
            'RegisterOT' => $this->RegisterOT,
            'InheritDeptRule' => $this->InheritDeptRule,
            'EMPRIVILEGE' => $this->EMPRIVILEGE,
        ]);

        $query->andFilterWhere(['like', 'Badgenumber', $this->Badgenumber])
            ->andFilterWhere(['like', 'SSN', $this->SSN])
            ->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Gender', $this->Gender])
            ->andFilterWhere(['like', 'TITLE', $this->TITLE])
            ->andFilterWhere(['like', 'PAGER', $this->PAGER])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'CITY', $this->CITY])
            ->andFilterWhere(['like', 'STATE', $this->STATE])
            ->andFilterWhere(['like', 'ZIP', $this->ZIP])
            ->andFilterWhere(['like', 'OPHONE', $this->OPHONE])
            ->andFilterWhere(['like', 'FPHONE', $this->FPHONE])
            ->andFilterWhere(['like', 'MINZU', $this->MINZU])
            ->andFilterWhere(['like', 'PASSWORD', $this->PASSWORD])
            ->andFilterWhere(['like', 'MVERIFYPASS', $this->MVERIFYPASS])
            ->andFilterWhere(['like', 'PHOTO', $this->PHOTO])
            ->andFilterWhere(['like', 'Notes', $this->Notes])
            ->andFilterWhere(['like', 'CardNo', $this->CardNo])
            ->andFilterWhere(['like', 'Pin1', $this->Pin1]);

        return $dataProvider;
    }
}
