<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "USER_SPEDAY".
 *
 * @property integer $ID
 * @property string $Badgenumber
 * @property string $STARTSPECDAY
 * @property string $ENDSPECDAY
 * @property string $YUANYING
 * @property string $DATE
 * @property string $REPORTSYMBL
 * @property string $SPCHECK
 * @property string $SPVALUE
 * @property string $TStart
 * @property string $TStop
 */
class USERSPEDAY extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USER_SPEDAY';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Badgenumber'], 'required'],
            [['Badgenumber', 'YUANYING', 'REPORTSYMBL', 'SPCHECK', 'SPVALUE', 'TStart', 'TStop'], 'string'],
            [['STARTSPECDAY', 'ENDSPECDAY', 'DATE'], 'safe'],
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
            'STARTSPECDAY' => 'Startspecday',
            'ENDSPECDAY' => 'Endspecday',
            'YUANYING' => 'Yuanying',
            'DATE' => 'Date',
            'REPORTSYMBL' => 'Reportsymbl',
            'SPCHECK' => 'Spcheck',
            'SPVALUE' => 'Spvalue',
            'TStart' => 'Tstart',
            'TStop' => 'Tstop',
        ];
    }
}
