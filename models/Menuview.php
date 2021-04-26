<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "Menuview".
 *
 * @property string $MID
 * @property string $MName
 * @property string $MDetail
 */
class Menuview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Menuview';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MID', 'MName', 'MDetail'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MID' => 'Mid',
            'MName' => 'Mname',
            'MDetail' => 'Mdetail',
        ];
    }
}
