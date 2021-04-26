<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "Machine".
 *
 * @property integer $ID
 * @property string $MachineAlias
 * @property string $ConnectType
 * @property string $IP
 * @property integer $SerialPort
 * @property integer $Port
 * @property integer $Baudrate
 * @property integer $MachineNumber
 * @property string $IsHost
 * @property integer $Enabled
 * @property integer $CommPassword
 * @property string $UILanguage
 * @property string $DateFormat
 * @property string $InOutRecordWarning
 * @property string $Idle
 * @property string $Voice
 * @property integer $Managercount
 * @property integer $Usercount
 * @property integer $Fingercount
 * @property string $FirmwareVersion
 * @property string $ProductType
 * @property string $ProduceKind
 * @property string $Series
 */
class Machine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Machine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MachineAlias', 'ConnectType', 'IP', 'IsHost', 'UILanguage', 'DateFormat', 'InOutRecordWarning', 'Idle', 'Voice', 'FirmwareVersion', 'ProductType', 'ProduceKind', 'Series'], 'string'],
            [['SerialPort', 'Port', 'Baudrate', 'MachineNumber', 'Enabled', 'CommPassword', 'Managercount', 'Usercount', 'Fingercount'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'MachineAlias' => 'Machine Alias',
            'ConnectType' => 'Connect Type',
            'IP' => 'Ip',
            'SerialPort' => 'Serial Port',
            'Port' => 'Port',
            'Baudrate' => 'Baudrate',
            'MachineNumber' => 'Machine Number',
            'IsHost' => 'Is Host',
            'Enabled' => 'Enabled',
            'CommPassword' => 'Comm Password',
            'UILanguage' => 'Uilanguage',
            'DateFormat' => 'Date Format',
            'InOutRecordWarning' => 'In Out Record Warning',
            'Idle' => 'Idle',
            'Voice' => 'Voice',
            'Managercount' => 'Managercount',
            'Usercount' => 'Usercount',
            'Fingercount' => 'Fingercount',
            'FirmwareVersion' => 'Firmware Version',
            'ProductType' => 'Product Type',
            'ProduceKind' => 'Produce Kind',
            'Series' => 'Series',
        ];
    }
}
