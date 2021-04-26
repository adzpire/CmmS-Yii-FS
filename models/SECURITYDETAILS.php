<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "SECURITYDETAILS".
 *
 * @property integer $SECURITYDETAILID
 * @property integer $USERID
 * @property integer $DEPTID
 * @property integer $SCHEDULE
 * @property integer $USERINFO
 * @property integer $ENROLLFINGERS
 * @property integer $REPORTVIEW
 * @property string $REPORT
 * @property integer $ReadOnly
 * @property integer $FullControl
 */
class SECURITYDETAILS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SECURITYDETAILS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERID', 'DEPTID', 'SCHEDULE', 'USERINFO', 'ENROLLFINGERS', 'REPORTVIEW', 'ReadOnly', 'FullControl'], 'integer'],
            [['REPORT'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SECURITYDETAILID' => 'Securitydetailid',
            'USERID' => 'Userid',
            'DEPTID' => 'Deptid',
            'SCHEDULE' => 'Schedule',
            'USERINFO' => 'Userinfo',
            'ENROLLFINGERS' => 'Enrollfingers',
            'REPORTVIEW' => 'Reportview',
            'REPORT' => 'Report',
            'ReadOnly' => 'Read Only',
            'FullControl' => 'Full Control',
        ];
    }
}
