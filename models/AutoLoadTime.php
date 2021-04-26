<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "AutoLoadTime".
 *
 * @property integer $ID
 * @property integer $MachineNumber
 * @property integer $TimeNo
 * @property string $TimeCheck
 * @property string $Enable
 */
class AutoLoadTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AutoLoadTime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MachineNumber', 'TimeNo'], 'integer'],
            [['TimeCheck'], 'safe'],
            [['Enable'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'MachineNumber' => 'Machine Number',
            'TimeNo' => 'Time No',
            'TimeCheck' => 'Time Check',
            'Enable' => 'Enable',
        ];
    }
}
