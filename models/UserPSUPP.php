<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "UserPSUPP".
 *
 * @property integer $ID
 * @property string $staffID
 * @property string $PsuPP
 */
class UserPSUPP extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UserPSUPP';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staffID', 'PsuPP'], 'required'],
            [['staffID', 'PsuPP'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'staffID' => 'Staff ID',
            'PsuPP' => 'Psu Pp',
        ];
    }
}
