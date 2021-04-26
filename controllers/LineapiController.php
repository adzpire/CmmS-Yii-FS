<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\fs\controllers;
use Yii;
use yii\console\Controller;
use app\modules\fs\models\Linenotify;
use app\modules\fs\models\LinenotifySearch;
use app\modules\fs\models\LinetokenSearch;
use app\modules\fs\models\CHECKINOUT;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LineapiController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }
	
	public function actionTruncate()
    {		
		try {
			(new \yii\db\Query())->createCommand()->truncateTable('Linenotify')->execute();
		} catch (\Exception $e) {
			throw $e;
		}	
    }
	
	 public function actionCurl()
    {
		$tokenlist = ArrayHelper::map(LinetokenSearch::find()->all(), 'staffID', 'Line_Token');
		$notifylist = ArrayHelper::map(LinenotifySearch::find()->all(), 'staffID', 'userInfo.Name');
		foreach($notifylist as $key=>$value){
			if (array_key_exists($key,$tokenlist)){
				unset($tokenlist[$key]);
			}
		}
		if(!empty($tokenlist)){
			foreach($tokenlist as $key=>$value){
					$tmpmdl = CHECKINOUT::getOntime($key);
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
						$notimdl = new Linenotify();
						$notimdl->staffID = $key;
						$notimdl->save();
					}else{
						$this->notify_message("**คุณยังไม่ได้ลงลายมือวันนี้้! เร็วครับ!! ", $value);
					}					
				} 
			}
		}
		print_r($tokenlist);echo date('H:m:s Y-m-d');
		
		exit();
		$res = $this->notify_message($message, $line_token);

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
