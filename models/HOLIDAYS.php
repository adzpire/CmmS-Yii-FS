<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "HOLIDAYS".
 *
 * @property integer $HOLIDAYID
 * @property string $HOLIDAYNAME
 * @property string $STARTTIME
 * @property integer $DURATION
 * @property integer $HOLIDAYDAY
 * @property string $STARTTIME1
 * @property integer $DURATION1
 * @property integer $HOLIDAYTYPE
 * @property string $XINBIE
 * @property string $MINZU
 * @property integer $DeptID
 */
class HOLIDAYS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'HOLIDAYS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HOLIDAYNAME', 'STARTTIME', 'XINBIE', 'MINZU'], 'string'],
            [['DURATION', 'HOLIDAYDAY', 'DURATION1', 'HOLIDAYTYPE', 'DeptID'], 'integer'],
            [['STARTTIME1'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HOLIDAYID' => 'Holidayid',
            'HOLIDAYNAME' => 'Holidayname',
            'STARTTIME' => 'Starttime',
            'DURATION' => 'Duration',
            'HOLIDAYDAY' => 'Holidayday',
            'STARTTIME1' => 'Starttime1',
            'DURATION1' => 'Duration1',
            'HOLIDAYTYPE' => 'Holidaytype',
            'XINBIE' => 'Xinbie',
            'MINZU' => 'Minzu',
            'DeptID' => 'Dept ID',
        ];
    }
}
