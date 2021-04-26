<?php
namespace app\modules\fs\models;

use Yii;
use yii\base\NotSupportedException;
//use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
 
 /**
 * This is the model class for table "USERINFO".
 *
 * @property integer $USERID
 * @property string $Badgenumber
 * @property string $SSN
 * @property string $Name
 * @property string $Gender
 * @property string $TITLE
 * @property string $PAGER
 * @property string $BIRTHDAY
 * @property string $HIREDDAY
 * @property string $street
 * @property string $CITY
 * @property string $STATE
 * @property string $ZIP
 * @property string $OPHONE
 * @property string $FPHONE
 * @property integer $VERIFICATIONMETHOD
 * @property integer $DEFAULTDEPTID
 * @property integer $SECURITYFLAGS
 * @property integer $ATT
 * @property integer $INLATE
 * @property integer $OUTEARLY
 * @property integer $OVERTIME
 * @property integer $SEP
 * @property integer $HOLIDAY
 * @property string $MINZU
 * @property string $PASSWORD
 * @property integer $LUNCHDURATION
 * @property string $MVERIFYPASS
 * @property resource $PHOTO
 * @property resource $Notes
 * @property integer $privilege
 * @property integer $InheritDeptSch
 * @property integer $InheritDeptSchClass
 * @property integer $AutoSchPlan
 * @property integer $MinAutoSchInterval
 * @property integer $RegisterOT
 * @property integer $InheritDeptRule
 * @property integer $EMPRIVILEGE
 * @property string $CardNo
 * @property string $Pin1
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

	public $auth_key;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        //return '{{%user}}';
        return '{{%USERINFO}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            //TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        //return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
        return static::findOne(['Badgenumber' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        //return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
        return static::findOne(['SSN' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
