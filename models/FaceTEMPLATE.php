<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "FaceTEMPLATE".
 *
 * @property integer $ID
 * @property integer $UMS_ID
 * @property string $Face_TEMPLATE
 */
class FaceTEMPLATE extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'FaceTEMPLATE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UMS_ID'], 'integer'],
            [['Face_TEMPLATE'], 'string'],
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
            'Face_TEMPLATE' => 'Face  Template',
        ];
    }
}
