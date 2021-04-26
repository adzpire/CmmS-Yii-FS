<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "NUM_RUN".
 *
 * @property integer $NUM_RUNID
 * @property integer $OLDID
 * @property string $NAME
 * @property string $STARTDATE
 * @property string $ENDDATE
 * @property integer $CYLE
 * @property integer $UNITS
 * @property integer $IMGINDEX
 */
class NUMRUN extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NUM_RUN';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OLDID', 'CYLE', 'UNITS', 'IMGINDEX'], 'integer'],
            [['NAME'], 'required'],
            [['NAME'], 'string'],
            [['STARTDATE', 'ENDDATE'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NUM_RUNID' => 'Num  Runid',
            'OLDID' => 'Oldid',
            'NAME' => 'Name',
            'STARTDATE' => 'Startdate',
            'ENDDATE' => 'Enddate',
            'CYLE' => 'Cyle',
            'UNITS' => 'Units',
            'IMGINDEX' => 'Imgindex',
        ];
    }
}
