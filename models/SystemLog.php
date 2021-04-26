<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "SystemLog".
 *
 * @property integer $ID
 * @property string $Operator
 * @property string $LogTime
 * @property string $MachineAlias
 * @property integer $LogTag
 * @property string $LogDescr
 * @property string $USERID
 */
class SystemLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'SystemLog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Operator', 'MachineAlias', 'LogDescr', 'USERID'], 'string'],
            [['LogTime'], 'safe'],
            [['LogTag'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Operator' => 'Operator',
            'LogTime' => 'Log Time',
            'MachineAlias' => 'Machine Alias',
            'LogTag' => 'Log Tag',
            'LogDescr' => 'Log Descr',
            'USERID' => 'Userid',
        ];
    }
}
