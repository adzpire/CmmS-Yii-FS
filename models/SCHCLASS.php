<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "SCHCLASS".
 *
 * @property integer $SCHCLASSID
 * @property string $SCHNAME
 * @property string $STARTTIME
 * @property string $ENDTIME
 * @property integer $LATEMINUTES
 * @property integer $EARLYMINUTES
 * @property integer $CHECKIN
 * @property integer $CHECKOUT
 * @property string $CHECKINTIME1
 * @property string $CHECKINTIME2
 * @property string $CHECKOUTTIME1
 * @property string $CHECKOUTTIME2
 * @property integer $COLOR
 * @property integer $AUTOBIND
 * @property double $WorkDay
 * @property string $SensorID
 * @property double $WorkMins
 */
class SCHCLASS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SCHCLASS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SCHNAME', 'STARTTIME', 'ENDTIME'], 'required'],
            [['SCHNAME', 'SensorID'], 'string'],
            [['STARTTIME', 'ENDTIME', 'CHECKINTIME1', 'CHECKINTIME2', 'CHECKOUTTIME1', 'CHECKOUTTIME2'], 'safe'],
            [['LATEMINUTES', 'EARLYMINUTES', 'CHECKIN', 'CHECKOUT', 'COLOR', 'AUTOBIND'], 'integer'],
            [['WorkDay', 'WorkMins'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SCHCLASSID' => 'Schclassid',
            'SCHNAME' => 'Schname',
            'STARTTIME' => 'Starttime',
            'ENDTIME' => 'Endtime',
            'LATEMINUTES' => 'Lateminutes',
            'EARLYMINUTES' => 'Earlyminutes',
            'CHECKIN' => 'Checkin',
            'CHECKOUT' => 'Checkout',
            'CHECKINTIME1' => 'Checkintime1',
            'CHECKINTIME2' => 'Checkintime2',
            'CHECKOUTTIME1' => 'Checkouttime1',
            'CHECKOUTTIME2' => 'Checkouttime2',
            'COLOR' => 'Color',
            'AUTOBIND' => 'Autobind',
            'WorkDay' => 'Work Day',
            'SensorID' => 'Sensor ID',
            'WorkMins' => 'Work Mins',
        ];
    }
}
