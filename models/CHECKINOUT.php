<?php

namespace app\modules\fs\models;

use app\modules\fs\models\USERINFO;

use Yii;

/**
 * This is the model class for table "CHECKINOUT".
 *
 * @property integer $id
 * @property string $Badgenumber
 * @property string $CHECKTIME
 * @property string $CHECKTYPE
 * @property string $VERIFYCODE
 * @property string $SENSORID
 * @property string $WorkCode
 * @property string $sn
 */
class CHECKINOUT extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CHECKINOUT';
    }

	 public $ppStName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Badgenumber'], 'required'],
            [['Badgenumber', 'CHECKTYPE', 'VERIFYCODE', 'SENSORID', 'WorkCode', 'sn'], 'string'],
            [['CHECKTIME'], 'safe'],
				[['Badgenumber'], 'exist', 'skipOnError' => true, 'targetClass' => USERINFO::className(), 'targetAttribute' => ['Badgenumber' => 'Badgenumber']],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Badgenumber' => 'Badgenumber',
            'CHECKTIME' => 'Checktime',
            'CHECKTYPE' => 'Checktype',
            'VERIFYCODE' => 'Verifycode',
            'SENSORID' => 'Sensorid',
            'WorkCode' => 'Work Code',
            'sn' => 'Sn',
        ];
    }
	 
	 public static function getIntime($id)
    {
		 $query = self::find()
					->where(
					"
			(
			CHECKTIME >= 
			DATEADD(hh,7,DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE())))
			AND 
			CHECKTIME < 
			DATEADD(n,40,DATEADD(hh,8,DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE()))))
			)"
			)->andWhere(['Badgenumber'=> $id])->count();
			
        return $query;
    }
	public static function getOntime($id)
    {
		 $query = self::find()
					->where(
					"
			(
			CHECKTIME >= 
			DATEADD(hh,7,DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE())))
			AND 
			CHECKTIME < 
			DATEADD(n,40,DATEADD(hh,8,DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE()))))
			)"
			)->andWhere(['Badgenumber'=> $id])->one();
			
        return $query;
    }
	public static function getToday($id)
    {
		 $query = self::find()
					->where(
			" 
			(
			CHECKTIME >= 
			DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE()))
			AND 
			CHECKTIME < 
			DATEADD(dd, 1, DATEDIFF(dd, 0, GETDATE()))
			)"
			)->andWhere(['Badgenumber'=> $id])->exists();
			
        return $query;
    }
	public static function getOntoday($id)
    {
		 $query = self::find()
					->where(
			" 
			(
			CHECKTIME >= 
			DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE()))
			AND 
			CHECKTIME < 
			DATEADD(dd, 1, DATEDIFF(dd, 0, GETDATE()))
			)"
			)->andWhere(['Badgenumber'=> $id])->one();
			
        return $query;
    }
	 public function getUserInfo()
    {
        return $this->hasOne(USERINFO::className(), ['Badgenumber' => 'Badgenumber']);
		
			/*
			$dataProvider->sort->attributes['ppStName'] = [
				'asc' => ['person.name' => SORT_ASC],
				'desc' => ['person.name' => SORT_DESC],
			];
			
			->andFilterWhere(['like', 'person.name', $this->ppStName])
			->orFilterWhere(['like', 'person.name1', $this->ppStName])
						in grid
			[
				'attribute' => 'ppStName',
				'value' => 'ppSt.name',
				'label' => $searchModel->attributeLabels()['pp_stid'],
				'filter' => \Person::ppStList,
			],
			
			in view
			[
				'label' => $model->attributeLabels()['pp_stid'],
				'value' => $model->ppSt->name,
				//'format' => ['date', 'long']
			],
			*/
    }
}
