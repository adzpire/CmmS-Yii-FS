<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "FingerTEMPLATE".
 *
 * @property integer $ID
 * @property integer $UMS_ID
 * @property resource $Finger_TEMPLATE0
 * @property resource $Finger_TEMPLATE1
 * @property resource $Finger_TEMPLATE2
 * @property resource $Finger_TEMPLATE3
 * @property resource $Finger_TEMPLATE4
 * @property resource $Finger_TEMPLATE5
 * @property resource $Finger_TEMPLATE6
 * @property resource $Finger_TEMPLATE7
 * @property resource $Finger_TEMPLATE8
 * @property resource $Finger_TEMPLATE9
 */
class FingerTEMPLATE extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'FingerTEMPLATE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UMS_ID'], 'integer'],
            [['Finger_TEMPLATE0', 'Finger_TEMPLATE1', 'Finger_TEMPLATE2', 'Finger_TEMPLATE3', 'Finger_TEMPLATE4', 'Finger_TEMPLATE5', 'Finger_TEMPLATE6', 'Finger_TEMPLATE7', 'Finger_TEMPLATE8', 'Finger_TEMPLATE9'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'UMS_ID' => 'Ums  ID',
            'Finger_TEMPLATE0' => 'Finger  Template0',
            'Finger_TEMPLATE1' => 'Finger  Template1',
            'Finger_TEMPLATE2' => 'Finger  Template2',
            'Finger_TEMPLATE3' => 'Finger  Template3',
            'Finger_TEMPLATE4' => 'Finger  Template4',
            'Finger_TEMPLATE5' => 'Finger  Template5',
            'Finger_TEMPLATE6' => 'Finger  Template6',
            'Finger_TEMPLATE7' => 'Finger  Template7',
            'Finger_TEMPLATE8' => 'Finger  Template8',
            'Finger_TEMPLATE9' => 'Finger  Template9',
        ];
    }
}
