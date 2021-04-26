<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "NUM_RUN_DEIL".
 *
 * @property integer $NUM_RUNID
 * @property string $STARTTIME
 * @property string $ENDTIME
 * @property string $SDAYS
 * @property string $EDAYS
 * @property integer $SCHCLASSID
 * @property string $Ease
 * @property string $CSTBOvertime
 * @property string $STBOvertime
 * @property string $STOBOvertime
 * @property string $BEase
 * @property string $CSTAOvertime
 * @property string $STAOvertime
 * @property string $STOAOvertime
 * @property string $AEase
 * @property string $BOT
 * @property string $AOT
 */
class NUMRUNDEIL extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NUM_RUN_DEIL';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NUM_RUNID', 'STARTTIME', 'SDAYS'], 'required'],
            [['NUM_RUNID', 'SCHCLASSID'], 'integer'],
            [['STARTTIME', 'ENDTIME', 'SDAYS', 'EDAYS', 'Ease', 'CSTBOvertime', 'STBOvertime', 'STOBOvertime', 'BEase', 'CSTAOvertime', 'STAOvertime', 'STOAOvertime', 'AEase', 'BOT', 'AOT'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NUM_RUNID' => 'Num  Runid',
            'STARTTIME' => 'Starttime',
            'ENDTIME' => 'Endtime',
            'SDAYS' => 'Sdays',
            'EDAYS' => 'Edays',
            'SCHCLASSID' => 'Schclassid',
            'Ease' => 'Ease',
            'CSTBOvertime' => 'Cstbovertime',
            'STBOvertime' => 'Stbovertime',
            'STOBOvertime' => 'Stobovertime',
            'BEase' => 'Bease',
            'CSTAOvertime' => 'Cstaovertime',
            'STAOvertime' => 'Staovertime',
            'STOAOvertime' => 'Stoaovertime',
            'AEase' => 'Aease',
            'BOT' => 'Bot',
            'AOT' => 'Aot',
        ];
    }
}
