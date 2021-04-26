<?php

namespace app\modules\fs\models;

use Yii;

use app\modules\fs\models\USERINFO;
/**
 * This is the model class for table "Linenotify".
 *
 * @property integer $ID
 * @property integer $staffID
 * @property integer $last_id
 */
class Linenotify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Linenotify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staffID'], 'required'],
            [['ID', 'staffID', 'last_id'], 'integer'],
			[['staffID'], 'exist', 'skipOnError' => true, 'targetClass' => USERINFO::className(), 'targetAttribute' => ['staffID' => 'Badgenumber']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'staffID' => 'Staff ID',
            'last_id' => 'Last scan ID',
        ];
    }
	
	public function getUserInfo()
    {
        return $this->hasOne(USERINFO::className(), ['Badgenumber' => 'staffID']);
	}
}
