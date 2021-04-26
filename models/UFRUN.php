<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "UFRUN".
 *
 * @property string $Badgenumber
 * @property string $STARTDATE
 * @property string $ENDDATE
 * @property string $NAME
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
 * @property string $SDAYS
 * @property string $EDAYS
 * @property string $Ease
 * @property string $CSTBOvertime
 * @property string $STBOvertime
 * @property string $STOBOvertime
 * @property string $BEase
 * @property string $CSTAOvertime
 * @property string $STAOvertime
 * @property string $STOAOvertime
 * @property string $AEase
 * @property string $BOT
 * @property string $AOT
 */
class UFRUN extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UFRUN';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Badgenumber', 'STARTDATE', 'ENDDATE', 'NAME', 'SCHCLASSID', 'SCHNAME', 'STARTTIME', 'ENDTIME', 'SDAYS'], 'required'],
            [['Badgenumber', 'NAME', 'SCHNAME', 'SensorID', 'SDAYS', 'EDAYS', 'Ease', 'CSTBOvertime', 'STBOvertime', 'STOBOvertime', 'BEase', 'CSTAOvertime', 'STAOvertime', 'STOAOvertime', 'AEase', 'BOT', 'AOT'], 'string'],
            [['STARTDATE', 'ENDDATE', 'STARTTIME', 'ENDTIME', 'CHECKINTIME1', 'CHECKINTIME2', 'CHECKOUTTIME1', 'CHECKOUTTIME2'], 'safe'],
            [['SCHCLASSID', 'LATEMINUTES', 'EARLYMINUTES', 'CHECKIN', 'CHECKOUT', 'COLOR', 'AUTOBIND'], 'integer'],
            [['WorkDay', 'WorkMins'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Badgenumber' => 'Badgenumber',
            'STARTDATE' => 'Startdate',
            'ENDDATE' => 'Enddate',
            'NAME' => 'Name',
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
            'SDAYS' => 'Sdays',
            'EDAYS' => 'Edays',
            'Ease' => 'Ease',
            'CSTBOvertime' => 'Cstbovertime',
            'STBOvertime' => 'Stbovertime',
            'STOBOvertime' => 'Stobovertime',
            'BEase' => 'Bease',
            'CSTAOvertime' => 'Cstaovertime',
            'STAOvertime' => 'Staovertime',
            'STOAOvertime' => 'Stoaovertime',
            'AEase' => 'Aease',
            'BOT' => 'Bot',
            'AOT' => 'Aot',
        ];
    }
}
