<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "UserMachine".
 *
 * @property integer $ID
 * @property integer $UMI_ID
 * @property integer $M_ID
 */
class UserMachine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'UserMachine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UMI_ID', 'M_ID'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'UMI_ID' => 'Umi  ID',
            'M_ID' => 'M  ID',
        ];
    }
}
