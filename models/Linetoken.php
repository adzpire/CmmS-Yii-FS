<?php

namespace app\modules\fs\models;

use app\modules\fs\models\USERINFO;

use Yii;

use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "Linetoken".
 *
 * @property integer $ID
 * @property integer $staffID
 * @property resource $Line_Token
 * @property integer $is_notify
 * @property integer $PP_user
 */
class Linetoken extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Linetoken';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staffID', 'Line_Token'], 'required'],
            [['ID', 'staffID'], 'integer'],
            [['Line_Token', 'PP_user'], 'string'],
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
            'staffID' => 'ชื่อ-นามสกุล',
            'Line_Token' => 'กรอก Line  Token',
            'is_notify' => 'Is Notify',
            'PP_user' => 'กรอก PSU Passport',
        ];
    }
	
	public function getUserInfo()
    {
        return $this->hasOne(USERINFO::className(), ['Badgenumber' => 'staffID']);
	}
	
	public static function getTokenList(){
		return ArrayHelper::map(self::find()->all(), 'staffID', 'staffID');
	}
	
	public static function itemsAlias($key) {
        $items = [
            'status' => [
                0 => 'ไม่',
                1 => 'ใช่',
            ],
            /* 'statusCondition'=>[
                1 => Yii::t('app', 'อนุมัติ'),
                0 => Yii::t('app', 'ไม่อนุมัติ'),
            ] */
        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    /* public function getStatusLabel() {
        $status = ArrayHelper::getValue($this->getItemStatus(), $this->status);
        $status = ($this->status === NULL) ? ArrayHelper::getValue($this->getItemStatus(), 0) : $status;
        switch ($this->status) {
            case 0 :
            case NULL :
                $str = '<span class="label label-warning">' . $status . '</span>';
                break;
            case 1 :
                $str = '<span class="label label-primary">' . $status . '</span>';
                break;
            case 2 :
                $str = '<span class="label label-success">' . $status . '</span>';
                break;
            case 3 :
                $str = '<span class="label label-danger">' . $status . '</span>';
                break;
            case 4 :
                $str = '<span class="label label-succes">' . $status . '</span>';
                break;
            default :
                $str = $status;
                break;
        }

        return $str;
    } */

    public static function getItemStatus() {
        return self::itemsAlias('status');
    }
}
