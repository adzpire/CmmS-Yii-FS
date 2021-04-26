<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "UserMachineInformation".
 *
 * @property integer $ID
 * @property double $UserMachineNumber
 * @property string $UI_ID
 * @property string $UMS_Name
 * @property string $CardNumber
 * @property string $Password
 * @property string $Privilege
 */
class UserMachineInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UserMachineInformation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UserMachineNumber'], 'number'],
            [['UI_ID', 'UMS_Name', 'CardNumber', 'Password', 'Privilege'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'UserMachineNumber' => 'User Machine Number',
            'UI_ID' => 'Ui  ID',
            'UMS_Name' => 'Ums  Name',
            'CardNumber' => 'Card Number',
            'Password' => 'Password',
            'Privilege' => 'Privilege',
        ];
    }
}
