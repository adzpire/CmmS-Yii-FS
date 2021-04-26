<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "SHIFT".
 *
 * @property integer $SHIFTID
 * @property string $NAME
 * @property integer $USHIFTID
 * @property string $STARTDATE
 * @property string $ENDDATE
 * @property integer $RUNNUM
 * @property integer $SCH1
 * @property integer $SCH2
 * @property integer $SCH3
 * @property integer $SCH4
 * @property integer $SCH5
 * @property integer $SCH6
 * @property integer $SCH7
 * @property integer $SCH8
 * @property integer $SCH9
 * @property integer $SCH10
 * @property integer $SCH11
 * @property integer $SCH12
 * @property integer $CYCLE
 * @property integer $UNITS
 */
class SHIFT extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SHIFT';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME'], 'string'],
            [['USHIFTID', 'RUNNUM', 'SCH1', 'SCH2', 'SCH3', 'SCH4', 'SCH5', 'SCH6', 'SCH7', 'SCH8', 'SCH9', 'SCH10', 'SCH11', 'SCH12', 'CYCLE', 'UNITS'], 'integer'],
            [['STARTDATE', 'ENDDATE'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SHIFTID' => 'Shiftid',
            'NAME' => 'Name',
            'USHIFTID' => 'Ushiftid',
            'STARTDATE' => 'Startdate',
            'ENDDATE' => 'Enddate',
            'RUNNUM' => 'Runnum',
            'SCH1' => 'Sch1',
            'SCH2' => 'Sch2',
            'SCH3' => 'Sch3',
            'SCH4' => 'Sch4',
            'SCH5' => 'Sch5',
            'SCH6' => 'Sch6',
            'SCH7' => 'Sch7',
            'SCH8' => 'Sch8',
            'SCH9' => 'Sch9',
            'SCH10' => 'Sch10',
            'SCH11' => 'Sch11',
            'SCH12' => 'Sch12',
            'CYCLE' => 'Cycle',
            'UNITS' => 'Units',
        ];
    }
}
