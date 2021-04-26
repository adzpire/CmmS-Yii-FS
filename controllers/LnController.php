<?php

namespace app\modules\fs\controllers;

use Yii;
use app\modules\fs\models\Linenotify;
use app\modules\fs\models\LinenotifySearch;
use app\modules\fs\models\LinetokenSearch;
use app\modules\fs\models\CHECKINOUT;
use app\modules\fs\models\StaffTodaySearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/**
 * LnController implements the CRUD actions for Linenotify model.
 */
class LnController extends Controller
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
	
	public function beforeAction()
    {
        Yii::$app->formatter->locale = 'th_TH';
        Yii::$app->formatter->calendar = \IntlDateFormatter::TRADITIONAL;

        return true;
    }
	
	 public function actionCurl()
    {
		$tokenlist = ArrayHelper::map(LinetokenSearch::find()->all(), 'staffID', 'Line_Token');
		$notifylist = ArrayHelper::map(LinenotifySearch::find()->all(), 'staffID', 'userInfo.Name');
		//$message = 'from 136.6';
		foreach($notifylist as $key=>$value){
			if (array_key_exists($key,$tokenlist)){
				unset($tokenlist[$key]);
			}
		}
		foreach($tokenlist as $key=>$value){
				$tmpmdl = CHECKINOUT::getOntime($key);
			/*print_r($tmpmdl);*/
			//if(CHECKINOUT::getIntime($key)){
			if(!empty($tmpmdl)){
					$time = new \DateTime($tmpmdl->CHECKTIME);
					$this->notify_message("** คุณได้ลงลายมือแล้ว. **\n วันที่-เวลา ".Yii::$app->formatter->asDatetime($time), $value);
					$notimdl = new Linenotify();
					$notimdl->staffID = $key;
					$notimdl->save();
			}else{				
				$tmpmdl1 = CHECKINOUT::getOntoday($key);
				print_r($tmpmdl1);
				if(!empty($tmpmdl1)){
					$time = new \DateTime($tmpmdl->CHECKTIME);
					$this->notify_message("**คุณได้ลงลายมือแล้ว. **\n วันที่-เวลา ".Yii::$app->formatter->asDatetime($time), $value);
					//echo 'you are Checked In. but Late';						
					//echo 'insert to notify table';
					$notimdl = new Linenotify();
					$notimdl->staffID = $key;
					$notimdl->save();
				}else{
					$this->notify_message("**คุณยังไม่ได้ลงลายมือวันนี้้! เร็วครับ!! ", $value);
				}					
			} 
		}
		
		print_r($tokenlist);echo date('H:m:s Y-m-d');
		/* foreach($tokenlist as $key => $value){
			$line_token[] = $value->Line_Token;
			echo $line_token.'<br/>';
		} */
		
		exit();
		$res = $this->notify_message($message, $line_token);
        /*
         * ส่งจาก Forum
         
        $last_thread = LineBot::findOne(['type' => 'forum']);
        $thread = Thread::find()->orderBy(['id' => SORT_DESC])->one();
        if(!$last_thread){
            $last_thread = new LineBot();
            $last_thread->type = 'forum';
            $last_thread->last_id = $thread->id;
            $last_thread->save();
            $message = $thread->subject.' '.Url::to('https://www.programmerthailand.com/forum/view/'.$thread->id);
            $res = $this->notify_message($message);

        }else{
            if($last_thread->last_id != $thread->id){
                $message = $thread->subject.' '.Url::to('https://www.programmerthailand.com/forum/view/'.$thread->id);
                $res = $this->notify_message($message);
                $last_thread->last_id = $thread->id;
                $last_thread->save();
            }
        }
*/

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

    /**
     * Lists all Linenotify models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LinenotifySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

	public function actionChecklast()
    {
        $last_thread = Linenotify::find('last_id')->orderBy(['last_id' => SORT_DESC])->one();
        $thread = CHECKINOUT::find('id')->orderBy(['id' => SORT_DESC])->one();

		if($last_thread->last_id != $thread->id){
			echo 'dif!';
		}else{
			echo 'same!';
		}
			exit();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Linenotify model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Linenotify model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Linenotify();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Linenotify model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Linenotify model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	public function actionTruncate()
    {		
		try {
			(new \yii\db\Query())->createCommand()->truncateTable('Linenotify')->execute();
		} catch (\Exception $e) {
			throw $e;
		}	
        //return $this->redirect(['index']);
    }
    /**
     * Finds the Linenotify model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Linenotify the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Linenotify::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
