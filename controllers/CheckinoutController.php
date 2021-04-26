<?php

namespace app\modules\fs\controllers;

use Yii;

use app\modules\fs\models\CHECKINOUT;
use app\modules\fs\models\CHECKINOUTSearch;
use app\modules\fs\models\TodaySearch;
use app\modules\fs\models\StaffTodaySearch;
use app\modules\fs\models\USERINFO;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Cookie;

use yii\filters\VerbFilter;

use yii\db\Expression;

use yii\widgets\Block;

use yii\helpers\Url;

Yii::$app->formatter->locale = 'th_TH';
Yii::$app->formatter->calendar = \IntlDateFormatter::TRADITIONAL;
/**
 * CheckinoutController implements the CRUD actions for CHECKINOUT model.
 */
class CheckinoutController extends Controller
{
    /**
     * @inheritdoc
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

	 public $chkinoutversion = '1.0';
	 public $cookie;
	
	private $lineapi = 'https://notify-api.line.me/api/notify';
        
	 public function beforeAction(){
		 $cookies = \Yii::$app->request->cookies;
		 //$this->cookie = $cookies->get('chkinoutversion');
		 //echo $this->cookie;exit();
		 if (($this->cookie = $cookies->get('chkinoutversion')) !== null) {
            if ($this->cookie->value != $this->chkinoutversion) {
                $delcookies = \Yii::$app->response->cookies;
                $delcookies->remove('chkinoutversion');
            }
        } else {
			  Yii::$app->view->beginBlock('version');
                echo $this->renderPartial('_version', [
					'version' => $this->chkinoutversion,
				]);
				Yii::$app->view->endBlock();	 
        }
		 
		Yii::$app->view->beginBlock('miniversion');
			echo $this->chkinoutversion;
		Yii::$app->view->endBlock();
		
        return true;
    }
	 
    /**
     * Lists all CHECKINOUT models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CHECKINOUTSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	 
	 public function actionVersion()
    {

        return $this->render('_version');
    }
	 
	 public function actionToday()
    {
        //$searchModel = new CHECKINOUTSearch(['CHECKTIME' => date('Y-m-d')]);
        $searchModel = new TodaySearch();
		  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		  
        return $this->renderAjax('today', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	 
	 public function actionStafftoday()
    {
        //$searchModel = new CHECKINOUTSearch(['CHECKTIME' => date('Y-m-d')]);
        $searchModel = new StaffTodaySearch();
		  $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		  
        return $this->render('stafftoday', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
				
        ]);
    }
	
	public function actionUsertoday($id)
    {
		$user = USERINFO::find()->where(['SSN' => $id])->one();
        //$searchModel = new CHECKINOUTSearch(['Badgenumber' => $user->Badgenumber]);
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$query = CHECKINOUT::find();
		$query->andWhere(
			" 
			(
			CHECKTIME >= 
			DATEADD(dd, 0, DATEDIFF(dd, 0, GETDATE()))
			AND 
			CHECKTIME < 
			DATEADD(dd, 1, DATEDIFF(dd, 0, GETDATE()))
			)"
			)->andWhere(['Badgenumber'=> $user->Badgenumber])->all();
		
		$dataProvider = new ActiveDataProvider([
            'query' => $query,
				'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);
		
        return $this->renderPartial('today', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
				
        ]);
    }
    /**
     * Displays a single CHECKINOUT model.
     * @param string $Badgenumber
     * @param string $CHECKTIME
     * @return mixed
     */
    public function actionView($Badgenumber, $CHECKTIME)
    {
        return $this->render('view', [
            'model' => $this->findModel($Badgenumber, $CHECKTIME),
        ]);
    }

    /**
     * Creates a new CHECKINOUT model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CHECKINOUT();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Badgenumber' => $model->Badgenumber, 'CHECKTIME' => $model->CHECKTIME]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CHECKINOUT model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $Badgenumber
     * @param string $CHECKTIME
     * @return mixed
     */
    public function actionUpdate($Badgenumber, $CHECKTIME)
    {
        $model = $this->findModel($Badgenumber, $CHECKTIME);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Badgenumber' => $model->Badgenumber, 'CHECKTIME' => $model->CHECKTIME]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CHECKINOUT model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Badgenumber
     * @param string $CHECKTIME
     * @return mixed
     */
    public function actionDelete($Badgenumber, $CHECKTIME)
    {
        $this->findModel($Badgenumber, $CHECKTIME)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CHECKINOUT model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $Badgenumber
     * @param string $CHECKTIME
     * @return CHECKINOUT the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Badgenumber, $CHECKTIME)
    {
        if (($model = CHECKINOUT::findOne(['Badgenumber' => $Badgenumber, 'CHECKTIME' => $CHECKTIME])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	 
	 public function actionSetvercookies()
	{
		$cookie = \Yii::$app->response->cookies;
		$cookie->add(new \yii\web\Cookie([
			'name' => 'chkinoutversion',
			'value' => $this->chkinoutversion,
		]));
		$this->redirect(Url::previous());
	}
	
	public function notify_message($message,$token){
		$queryData = array('message' => $message);
		$queryData = http_build_query($queryData,'','&');
		$headerOptions = array(
			 'http'=>array(
				'method'=>'POST',
				'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
						  ."Authorization: Bearer ".$token."\r\n"
						  ."Content-Length: ".strlen($queryData)."\r\n",
				'content' => $queryData
			 ),
		);
		$context = stream_context_create($headerOptions);
		$result = file_get_contents($lineapi,FALSE,$context);
		$res = json_decode($result);
		return $res;
	}
	
}
