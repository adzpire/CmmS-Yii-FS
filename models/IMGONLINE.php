<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "IMGONLINE".
 *
 * @property integer $ID
 * @property string $Badgenumber
 * @property string $IMAGENAME
 * @property string $DATEIMG
 * @property string $INSIDE
 * @property resource $IMAG1
 * @property string $IMAG2
 * @property string $IMAG3
 * @property string $IMAG4
 * @property string $IMAG5
 * @property string $IMAG6
 */
class IMGONLINE extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'IMGONLINE';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Badgenumber', 'IMAGENAME'], 'required'],
            [['Badgenumber', 'IMAGENAME', 'DATEIMG', 'INSIDE', 'IMAG1', 'IMAG2', 'IMAG3', 'IMAG4', 'IMAG5', 'IMAG6'], 'string'],
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
            'IMAGENAME' => 'Imagename',
            'DATEIMG' => 'Dateimg',
            'INSIDE' => 'Inside',
            'IMAG1' => 'Imag1',
            'IMAG2' => 'Imag2',
            'IMAG3' => 'Imag3',
            'IMAG4' => 'Imag4',
            'IMAG5' => 'Imag5',
            'IMAG6' => 'Imag6',
        ];
    }
}
