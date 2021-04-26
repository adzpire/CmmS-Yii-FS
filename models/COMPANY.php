<?php

namespace app\modules\fs\models;

use Yii;

/**
 * This is the model class for table "COMPANY".
 *
 * @property string $COMID
 * @property string $COMNAMETH
 * @property string $COMNAMEEN
 * @property string $ADDRESSTH1
 * @property string $ADDRESSTH2
 * @property string $PROVICETH
 * @property string $ZIPCODETH
 * @property string $ADDRESSEN1
 * @property string $ADDRESSE2
 * @property string $PROVICEEN
 * @property string $ZIPCODEEN
 * @property string $PHONE
 * @property string $FAX
 * @property string $CODENUMBER
 * @property string $CODETAX
 * @property string $CODESOCIAL
 * @property string $CODEBANK
 * @property resource $COMLOGO
 */
class COMPANY extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'COMPANY';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COMID'], 'required'],
            [['COMID', 'COMNAMETH', 'COMNAMEEN', 'ADDRESSTH1', 'ADDRESSTH2', 'PROVICETH', 'ZIPCODETH', 'ADDRESSEN1', 'ADDRESSE2', 'PROVICEEN', 'ZIPCODEEN', 'PHONE', 'FAX', 'CODENUMBER', 'CODETAX', 'CODESOCIAL', 'CODEBANK', 'COMLOGO'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'COMID' => 'Comid',
            'COMNAMETH' => 'Comnameth',
            'COMNAMEEN' => 'Comnameen',
            'ADDRESSTH1' => 'Addressth1',
            'ADDRESSTH2' => 'Addressth2',
            'PROVICETH' => 'Proviceth',
            'ZIPCODETH' => 'Zipcodeth',
            'ADDRESSEN1' => 'Addressen1',
            'ADDRESSE2' => 'Addresse2',
            'PROVICEEN' => 'Proviceen',
            'ZIPCODEEN' => 'Zipcodeen',
            'PHONE' => 'Phone',
            'FAX' => 'Fax',
            'CODENUMBER' => 'Codenumber',
            'CODETAX' => 'Codetax',
            'CODESOCIAL' => 'Codesocial',
            'CODEBANK' => 'Codebank',
            'COMLOGO' => 'Comlogo',
        ];
    }
}
