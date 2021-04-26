<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "HOLIDAY".
 *
 * @property integer $ID
 * @property string $HOLIDAYID
 * @property string $HOLIDAYREMARK
 */
class HOLIDAY extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'HOLIDAY';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HOLIDAYID', 'HOLIDAYREMARK'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'HOLIDAYID' => 'Holidayid',
            'HOLIDAYREMARK' => 'Holidayremark',
        ];
    }
}
