<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "MSysCompactError".
 *
 * @property integer $ErrorCode
 * @property string $ErrorDescription
 * @property resource $ErrorRecid
 * @property string $ErrorTable
 */
class MSysCompactError extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MSysCompactError';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ErrorCode'], 'integer'],
            [['ErrorDescription', 'ErrorRecid', 'ErrorTable'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ErrorCode' => 'Error Code',
            'ErrorDescription' => 'Error Description',
            'ErrorRecid' => 'Error Recid',
            'ErrorTable' => 'Error Table',
        ];
    }
}
