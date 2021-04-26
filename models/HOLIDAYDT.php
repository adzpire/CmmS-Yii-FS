<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "HOLIDAYDT".
 *
 * @property integer $ID
 * @property string $HOLIDAYID
 * @property string $HOLIDAYNAME
 * @property string $HOLIDAYDATE
 * @property string $HOLIDAYREMARK
 */
class HOLIDAYDT extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'HOLIDAYDT';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HOLIDAYID', 'HOLIDAYNAME', 'HOLIDAYREMARK'], 'string'],
            [['HOLIDAYDATE'], 'safe'],
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
            'HOLIDAYNAME' => 'Holidayname',
            'HOLIDAYDATE' => 'Holidaydate',
            'HOLIDAYREMARK' => 'Holidayremark',
        ];
    }
}
