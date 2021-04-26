<?php

namespace app\modules\fs\models;

use app\modules\fs\models\DEPARTMENTS;
use app\modules\fs\models\CHECKINOUT;

use Yii;

use yii\helpers\ArrayHelper;
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
class USERINFO extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'USERINFO';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Badgenumber'], 'required'],
            [['Badgenumber', 'SSN', 'Name', 'Gender', 'TITLE', 'PAGER', 'street', 'CITY', 'STATE', 'ZIP', 'OPHONE', 'FPHONE', 'MINZU', 'PASSWORD', 'MVERIFYPASS', 'PHOTO', 'Notes', 'CardNo', 'Pin1'], 'string'],
            [['BIRTHDAY', 'HIREDDAY'], 'safe'],
            [['VERIFICATIONMETHOD', 'DEFAULTDEPTID', 'SECURITYFLAGS', 'ATT', 'INLATE', 'OUTEARLY', 'OVERTIME', 'SEP', 'HOLIDAY', 'LUNCHDURATION', 'privilege', 'InheritDeptSch', 'InheritDeptSchClass', 'AutoSchPlan', 'MinAutoSchInterval', 'RegisterOT', 'InheritDeptRule', 'EMPRIVILEGE'], 'integer'],
				[['DEFAULTDEPTID'], 'exist', 'skipOnError' => true, 'targetClass' => DEPARTMENTS::className(), 'targetAttribute' => ['DEFAULTDEPTID' => 'DEPTID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USERID' => 'Userid',
            'Badgenumber' => 'Badgenumber',
            'SSN' => 'Ssn',
            'Name' => 'Name',
            'Gender' => 'Gender',
            'TITLE' => 'Title',
            'PAGER' => 'Pager',
            'BIRTHDAY' => 'Birthday',
            'HIREDDAY' => 'Hiredday',
            'street' => 'Street',
            'CITY' => 'City',
            'STATE' => 'State',
            'ZIP' => 'Zip',
            'OPHONE' => 'Ophone',
            'FPHONE' => 'Fphone',
            'VERIFICATIONMETHOD' => 'Verificationmethod',
            'DEFAULTDEPTID' => 'Defaultdeptid',
            'SECURITYFLAGS' => 'Securityflags',
            'ATT' => 'Att',
            'INLATE' => 'Inlate',
            'OUTEARLY' => 'Outearly',
            'OVERTIME' => 'Overtime',
            'SEP' => 'Sep',
            'HOLIDAY' => 'Holiday',
            'MINZU' => 'Minzu',
            'PASSWORD' => 'Password',
            'LUNCHDURATION' => 'Lunchduration',
            'MVERIFYPASS' => 'Mverifypass',
            'PHOTO' => 'Photo',
            'Notes' => 'Notes',
            'privilege' => 'Privilege',
            'InheritDeptSch' => 'Inherit Dept Sch',
            'InheritDeptSchClass' => 'Inherit Dept Sch Class',
            'AutoSchPlan' => 'Auto Sch Plan',
            'MinAutoSchInterval' => 'Min Auto Sch Interval',
            'RegisterOT' => 'Register Ot',
            'InheritDeptRule' => 'Inherit Dept Rule',
            'EMPRIVILEGE' => 'Emprivilege',
            'CardNo' => 'Card No',
            'Pin1' => 'Pin1',
        ];
    }
	 
	 public function getDeptInfo()
    {
        return $this->hasOne(DEPARTMENTS::className(), ['DEPTID' => 'DEFAULTDEPTID']);
	 }
	 
	 public static function getIntime($id)
    {
		 $query = CHECKINOUT::find()
					->where(
			"
			(
			CHECKTIME >= 
			DATEADD(hh,7,DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE())))
			AND 
			CHECKTIME < 
			DATEADD(n,41,DATEADD(hh,8,DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE()))))
			)"
			)->andWhere(['Badgenumber'=> $id])->exists();
			
        return $query;
    }
	 
	 public static function getToday($id)
    {
		 $query = CHECKINOUT::find()
					->where(
			" 
			(
			CHECKTIME >= 
			DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE()))
			AND 
			CHECKTIME < 
			DATEADD(dd, 1, DATEDIFF(dd, 0, GETDATE()))
			)"
			)->andWhere(['Badgenumber'=> $id])->exists();
			
        return $query;
    }
	 
		public function getImageurl()
		{
			//return 'http://comm-sci.pn.psu.ac.th/uploads/user/avatars/'.$this->SSN.'/'.$this->SSN.'.jpg';
			if(!$this->SSN){
				return null;
			}
			$homepage = file_get_contents('http://comm-sci.pn.psu.ac.th/office/person/default/rest-person?id='.$this->SSN);
			$json_a = json_decode($homepage, true);
			return $json_a['avatar'];
		}
	public static function getStaffList(){
	return ArrayHelper::map(self::find()->where(['DEFAULTDEPTID'=>[5,7]])->all(), 'Badgenumber', 'Name');
	}
}
