<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "USER_OF_RUN".
 *
 * @property integer $ID
 * @property string $Badgenumber
 * @property integer $NUM_OF_RUN_ID
 * @property string $STARTDATE
 * @property string $ENDDATE
 * @property integer $ISNOTOF_RUN
 * @property integer $ORDER_RUN
 */
class USEROFRUN extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USER_OF_RUN';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Badgenumber', 'NUM_OF_RUN_ID'], 'required'],
            [['Badgenumber'], 'string'],
            [['NUM_OF_RUN_ID', 'ISNOTOF_RUN', 'ORDER_RUN'], 'integer'],
            [['STARTDATE', 'ENDDATE'], 'safe'],
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
            'NUM_OF_RUN_ID' => 'Num  Of  Run  ID',
            'STARTDATE' => 'Startdate',
            'ENDDATE' => 'Enddate',
            'ISNOTOF_RUN' => 'Isnotof  Run',
            'ORDER_RUN' => 'Order  Run',
        ];
    }
}
