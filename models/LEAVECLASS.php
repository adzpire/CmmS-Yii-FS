<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "LEAVECLASS".
 *
 * @property integer $LEAVEID
 * @property string $LEAVENAME
 * @property string $REPORTSYMBOL
 * @property integer $COLOR
 */
class LEAVECLASS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'LEAVECLASS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LEAVENAME'], 'required'],
            [['LEAVENAME', 'REPORTSYMBOL'], 'string'],
            [['COLOR'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LEAVEID' => 'Leaveid',
            'LEAVENAME' => 'Leavename',
            'REPORTSYMBOL' => 'Reportsymbol',
            'COLOR' => 'Color',
        ];
    }
}
