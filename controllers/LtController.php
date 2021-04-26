<?php

namespace app\modules\fs\controllers;

use Yii;
use app\modules\fs\models\Linetoken;
use app\modules\fs\models\LinetokenSearch;
use app\modules\fs\models\StaffTodaySearch;
use app\modules\fs\models\USERINFO;
use app\modules\fs\models\CHECKINOUT;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\filters\AccessControl;
/**
 * LtController implements the CRUD actions for Linetoken model.
 */
class LtController extends Controller
{
    /**
     * @inheritdoc
     */
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
				'only' => ['create', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            /* 'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
					'delete' => ['POST'],
                ],
            ], */
        ];
    }

	public $admin;

	public function beforeAction($action)
	{
		if (parent::beforeAction($action)) {
			/* if (!Yii::$app->user->isGuest) {
				if (Yii::$app->user->identity->status == '5' && $this->getRoute() != 'site/confirm-email' && $this->getRoute()
					!= 'site/resend-email') {
					$this->redirect(['site/confirm-email']);
				}
			} */
			$this->admin = [52, 40035];
			return true;
		} else {
			return false;
		}
	}
	
    /**
     * Lists all Linetoken models.
     * @return mixed
     */
    public function actionIndex()
    {
        /* */ 
		$searchModel = new LinetokenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		//$model = new Linetoken();
		$ulist = StaffTodaySearch::getStaffList();
		$tlist = Linetoken::getTokenList();		
		foreach($tlist as $key=>$value){
			if (array_key_exists($value,$ulist)){
				unset($ulist[$value]);
			}
		}
		
		return $this->render('index', [
			//'model' => $model,
            'ulist' => $ulist,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Linetoken model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		/* $model = Linetoken::find()->where(['staffID'=>$id])->one();
		if(empty($model)){
			return $this->redirect(['create']);			
		}    
			return $this->render('view', [
            'model' => $model,
			]); */
		return $this->render('view', [
            'model' => $this->findModel($id),
        ]);	
		
    }

    /**
     * Creates a new Linetoken model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Linetoken();
		$ulist = StaffTodaySearch::getStaffList();
		$tlist = Linetoken::getTokenList();		
		//print_r($tlist);
		foreach($tlist as $key=>$value){
			if (array_key_exists($value,$ulist)){
				//echo "Key exists!<br/>";
				unset($ulist[$value]);
			}
		}
		//echo \Yii::$app->user->id;
		//$test = USERINFO::findOne(\Yii::$app->user->id);
		//print_r($test);
		//exit();
		//exit();
		$usermdl = USERINFO::findOne(\Yii::$app->user->id);
		
        if ($model->load(Yii::$app->request->post())) {
			$model->is_notify = 1;
			$model->staffID = \Yii::$app->user->id;
			$model->PP_user = $usermdl->SSN;
			if($model->save()){
				$this->notify_message("** จากระบบของ วสส. **\n คุณได้ลงทะเบียนแจ้งการเข้างาน ของคณะ เรียบร้อยแล้ว", $model->Line_Token); 
				
				$tmpmdl = CHECKINOUT::getOntime($model->staffID);
				if(!empty($tmpmdl)){
						$time = new \DateTime($tmpmdl->CHECKTIME);
						$this->notify_message("** คุณได้ลงลายมือแล้ว. **\n วันที่-เวลา ".Yii::$app->formatter->asDatetime($time), $value);
						$notimdl = new Linenotify();
						$notimdl->staffID = $model->staffID;
						$notimdl->save();
				}else{
					$tmpmdl1 = CHECKINOUT::getOntoday($model->staffID);
					if(!empty($tmpmdl1)){
						$time = new \DateTime($tmpmdl->CHECKTIME);
						$this->notify_message("**คุณได้ลงลายมือแล้ว. **\n วันที่-เวลา ".Yii::$app->formatter->asDatetime($time), $value);
						//echo 'you are Checked In. but Late';						
						//echo 'insert to notify table';
						$notimdl = new Linenotify();
						$notimdl->staffID = $model->staffID;
						$notimdl->save();
					}else{
						$this->notify_message("**คุณยังไม่ได้ลงลายมือวันนี้! เร็วครับ!! ", $value);
					}					
				}
			
				Yii::$app->getSession()->setFlash('alert',[
					'body'=>'ลงทะเบียนเสร็จเรียบร้อย! ลองตรวจสอบ line ของท่านว่ามีการแจ้งเตือน ',
					'options'=>['class'=>'alert-success']
				]);
				return $this->redirect(['view', 'id' => $model->ID]);							
			}
            print_r($model->getErrors());exit();
        } else {
			$ex = Linetoken::find()->where(['staffID'=> \Yii::$app->user->id])->one();
			if(!empty($ex)){
				//echo 'exist';exit();
				return $this->redirect(['view', 'id' => $ex->ID]);	
			}else{
				return $this->render('create', [
					'model' => $model,
					'usermdl' => $usermdl,				
				]);
			}
        }
    }

    /**
     * Updates an existing Linetoken model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$ulist = StaffTodaySearch::getStaffList();
        
		$tlist = Linetoken::getTokenList();		
		foreach($tlist as $key=>$value){
			if (array_key_exists($value,$ulist)){
				unset($ulist[$value]);
			}
		}
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'ulist' => $ulist,
            ]);
        }
    }

    /**
     * Deletes an existing Linetoken model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$model = $this->findModel($id);
		if($model->staffID == \Yii::$app->user->id || in_array(\Yii::$app->user->id, $admin)){
			$this->notify_message("** จากระบบของ วสส. **\n คุณได้ ออกจากระบบ ลงทะเบียนแจ้งการเข้างาน ของคณะ เรียบร้อยแล้ว", $model->Line_Token); 
			$model->delete();
		}else{
			echo 'cannot delete another user';exit();
		}        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Linetoken model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Linetoken the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Linetoken::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function notify_message($message, $line_token)
    {
        $line_api = 'https://notify-api.line.me/api/notify';
        //$line_token = 'YOUR-TOKEN';

        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData,'','&');
        $headerOptions = array(
            'http'=>array(
                'method'=>'POST',
                'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                    ."Authorization: Bearer ".$line_token."\r\n"
                    ."Content-Length: ".strlen($queryData)."\r\n",
                'content' => $queryData
            )
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents($line_api, FALSE, $context);
        $res = json_decode($result);
        return $res;
    }
}
