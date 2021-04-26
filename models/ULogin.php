<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "ULogin".
 *
 * @property integer $ID
 * @property string $Badgenumber
 * @property string $Us
 * @property string $Pw
 */
class ULogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ULogin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Badgenumber', 'Us'], 'required'],
            [['Badgenumber', 'Us', 'Pw'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Badgenumber' => 'Badgenumber',
            'Us' => 'Us',
            'Pw' => 'Pw',
        ];
    }
}
