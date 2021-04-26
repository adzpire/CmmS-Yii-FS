<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "MODE".
 *
 * @property integer $ID
 * @property string $NUMBERMODE
 * @property string $VALUEMODE
 */
class MODE extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MODE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NUMBERMODE'], 'required'],
            [['NUMBERMODE', 'VALUEMODE'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NUMBERMODE' => 'Numbermode',
            'VALUEMODE' => 'Valuemode',
        ];
    }
}
