<?php

namespace app\modules\fs\controllers;
use Yii;
use app\modules\fs\models\CHECKINOUT;
use app\modules\fs\models\CHECKINOUTSearch;
use app\modules\fs\models\TodaySearch;
use app\modules\fs\models\StaffTodaySearch;
use app\modules\fs\models\USERINFO;
use app\modules\fs\models\LoginForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Cookie;

use yii\filters\VerbFilter;

use yii\db\Expression;

use yii\widgets\Block;

use yii\helpers\Url;

/**
 * Default controller for the `linenotify` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public $moduletitle;
    public $modul;
    public function beforeAction($action){
        $this->modul = \Yii::$app->controller->module;
        $this->moduletitle = Yii::t('app', $this->modul->params['title']);
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        Yii::$app->view->title = Yii::t('app', 'หน้าแรก').' - '.$this->moduletitle;
        
		$searchModel = new StaffTodaySearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionQr()
    {
        $this->layout = false;
        return $this->render('qrcode');
    }
    public function actionReadme()
    {        
        return $this->render('readme');
    }
    public function actionChangelog()
    {
        return $this->render('changelog');
    }
    public function actionSetvercookies()
    {
        $cookie = \Yii::$app->response->cookies;
        $cookie->add(new \yii\web\Cookie([
            'name' => $this->modul->params['modulecookies'],
            'value' => $this->modul->params['ModuleVers'],
            'expire' => time() + (60*60*24*30),
        ]));
        $this->redirect(Url::previous());
    }
    public function actionMail() {
        $model = new MailSend();
        // $t = Yii::$app->mailer->transport;
        // // $t::

        // var_dump(Yii::$app->mailer->transport->getUsername());
        // echo Yii::$app->mailer->transport['username'];
        // exit();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            // Yii::$app->mailer->transport->_username = Yii::$app->user->identity->email;
            
            // Yii:$app->mailer->transport->password = $model->password;
            // echo $model->password;
            
            // Yii::$app->mailer->transport = [
            //     '_username' => Yii::$app->user->identity->email,
            //     '_password' => $model->password,
            // ];
            // print_r(Yii::$app->mailer->transport->_handlers);
            // echo Yii::$app->mailer->transport['username'];
            // exit();
            Yii::$app->mailer->transport->setUsername(Yii::$app->user->identity->email);
            Yii::$app->mailer->transport->setPassword($model->password);
            $message = Yii::$app->mailer->compose()
            ->setFrom([ Yii::$app->user->identity->email => Yii::$app->user->identity->profile->fullname])
            ->setTo($model->sendto)
            ->setSubject($model->subject)
            ->setHtmlBody($model->body);
            if(!$message->send()){
                echo 'error sending email';
                exit();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('mail', [
                'model' => $model,
            ]);
        }
        // Yii::$app->mailer->compose()
        //     ->setFrom(['abdul-aziz.d@psu.ac.th'=>'admin commsci'])
        //     ->setTo('abdul-aziz.d@psu.ac.th')
        //     ->setSubject('test Message subject')
        //     ->setTextBody('test Plain text content')
        //     ->setHtmlBody('<b>test HTML content</b>')
        //     ->send();
        // echo 'email sent';
    }
	
	public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
