<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "CODEJOB".
 *
 * @property integer $ID
 * @property string $CODEJOB
 * @property string $VALUEJOB
 * @property string $CODENAME
 * @property string $CODEDETAIL
 */
class CODEJOB extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CODEJOB';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODEJOB', 'VALUEJOB', 'CODENAME', 'CODEDETAIL'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CODEJOB' => 'Codejob',
            'VALUEJOB' => 'Valuejob',
            'CODENAME' => 'Codename',
            'CODEDETAIL' => 'Codedetail',
        ];
    }
}
