<?php
namespace app\modules\fs\models;

use Yii;
use yii\base\Model;
use app\modules\fs\models\USERINFO;
use app\modules\fs\models\Ldap;
/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            /* if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            } */
              $ldap = new Ldap();
              /* $ldap->server = $this->module->ldapConfig['server'];
              $ldap->basedn = $this->module->ldapConfig['basedn'];
              $ldap->domain = $this->module->ldapConfig['domain']; */
			  $ldap->server = \Yii::$app->params['server'];
			  $ldap->basedn = \Yii::$app->params['basedn'];
			  $ldap->domain = \Yii::$app->params['domain'];
              $ldap->username = $this->username;
              $ldap->password = $this->password;
			  //print_r($ldap);exit();
              $authen = $ldap->Authenticate();
              if(!$user || !$authen['status']){
                  $this->addError($attribute, 'Incorrect username or password.');
              }
              /* if (!$user || !$user->validatePassword($this->password)) {
                  $this->addError($attribute, 'Incorrect username or password.');
              } */            
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
		//print_r($this->_user);exit();
        return $this->_user;
    }
}
