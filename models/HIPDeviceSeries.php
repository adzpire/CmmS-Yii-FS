<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "HIPDeviceSeries".
 *
 * @property integer $ID
 * @property string $S_Name
 * @property string $S_Group
 * @property integer $S_GroupID
 * @property integer $S_TranferID
 */
class HIPDeviceSeries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'HIPDeviceSeries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['S_Name', 'S_Group'], 'string'],
            [['S_GroupID', 'S_TranferID'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'S_Name' => 'S  Name',
            'S_Group' => 'S  Group',
            'S_GroupID' => 'S  Group ID',
            'S_TranferID' => 'S  Tranfer ID',
        ];
    }
}
