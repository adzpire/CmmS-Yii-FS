<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "DEPARTMENTS".
 *
 * @property integer $DEPTID
 * @property string $DEPTNAME
 * @property integer $SUPDEPTID
 * @property integer $InheritParentSch
 * @property integer $InheritDeptSch
 * @property integer $InheritDeptSchClass
 * @property integer $AutoSchPlan
 * @property integer $InLate
 * @property integer $OutEarly
 * @property integer $InheritDeptRule
 * @property integer $MinAutoSchInterval
 * @property integer $RegisterOT
 * @property integer $DefaultSchId
 * @property integer $ATT
 * @property integer $Holiday
 * @property integer $OverTime
 * @property string $COMID
 */
class DEPARTMENTS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'DEPARTMENTS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DEPTNAME', 'COMID'], 'string'],
            [['SUPDEPTID', 'InheritParentSch', 'InheritDeptSch', 'InheritDeptSchClass', 'AutoSchPlan', 'InLate', 'OutEarly', 'InheritDeptRule', 'MinAutoSchInterval', 'RegisterOT', 'DefaultSchId', 'ATT', 'Holiday', 'OverTime'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DEPTID' => 'Deptid',
            'DEPTNAME' => 'Deptname',
            'SUPDEPTID' => 'Supdeptid',
            'InheritParentSch' => 'Inherit Parent Sch',
            'InheritDeptSch' => 'Inherit Dept Sch',
            'InheritDeptSchClass' => 'Inherit Dept Sch Class',
            'AutoSchPlan' => 'Auto Sch Plan',
            'InLate' => 'In Late',
            'OutEarly' => 'Out Early',
            'InheritDeptRule' => 'Inherit Dept Rule',
            'MinAutoSchInterval' => 'Min Auto Sch Interval',
            'RegisterOT' => 'Register Ot',
            'DefaultSchId' => 'Default Sch ID',
            'ATT' => 'Att',
            'Holiday' => 'Holiday',
            'OverTime' => 'Over Time',
            'COMID' => 'Comid',
        ];
    }
}
