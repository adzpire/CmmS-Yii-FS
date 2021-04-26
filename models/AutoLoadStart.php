<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "AutoLoadStart".
 *
 * @property integer $ID
 * @property integer $MachineNumber
 * @property string $StartStatus
 * @property string $Sunday
 * @property string $Monday
 * @property string $Tuesday
 * @property string $Wednesday
 * @property string $Thursday
 * @property string $Friday
 * @property string $Saturday
 */
class AutoLoadStart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AutoLoadStart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MachineNumber'], 'integer'],
            [['StartStatus', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'MachineNumber' => 'Machine Number',
            'StartStatus' => 'Start Status',
            'Sunday' => 'Sunday',
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
            'Saturday' => 'Saturday',
        ];
    }
}
