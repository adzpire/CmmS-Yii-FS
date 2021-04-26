<?php
namespace app\modules\fs\components;

use Yii;
use yii\base\Component;
use yii\bootstrap\Html;
use yii\helpers\Url;
use frontend\modules\linenotify\models\Linetoken;
class AdzpireComponent extends Component{
	public $content;
	
	public function init(){
		parent::init();
		$this->content= 'Hello Yii 2.0';
	}
	
	public function display($content=null){
		if($content!=null){
			$this->content= $content;
		}
		echo Html::encode($this->content);
	}
	
	public static function listDataWithEmpty($list, $emptyText){
        $listCat = array(''=>$emptyText);
        foreach ($list as $key => $item) {
            $listCat[$key] = $item;
        }
        return $listCat;
    }
	 
    public static function headeralert($arr =[], $haskey = false){
        $tmp = ($haskey) ? array_values($arr) : $arr;
        
        for($i = 0; $i < count($tmp); $i++){
            $searchModel = new $tmp[$i]();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            if($dataProvider->getTotalCount() > 0){
                return '<span class="label label-danger"style="top:5px; right: 10px; font-size: 9px; padding: 2px 3px;position: relative">!</span>';
            }
        }
        return false; 
    }

    public static function formplaintext($label, $data, $layout = 'horizontal', $cfgarray){
        if(!empty($cfgarray)){
            $labelcss = $cfgarray['label'];$stringcss = $cfgarray['wrapper'];
        }else{
            $labelcss = 'col-sm-3';$stringcss = 'col-sm-6';
        }
        if($layout == 'horizontal'){
            return '<div class="form-group">
                    <label class="control-label '.$labelcss.'">'.$label.'</label>
                    <div class="'.$stringcss.'" style="padding-top: 7px;">'.$data.'</div>
                </div>';            
        }else{
            return '<div class="form-group">
                    <label class="control-label">'.$label.'</label>
                    <p>'.$data.'</p>
                </div>';
        }
        
    }
	 
	public static function btnblock($arr){
        $tmp ='';
        switch (count($arr)) {
            case 1:
                // echo "Your favorite color is red!";
                $div = '<div class="col-xs-12 col-sm-12 col-md-12">';
                break;
            case 2:
                $div = '<div class="col-xs-12 col-sm-6 col-md-6">';
                break;
            case 3:
                $div = '<div class="col-xs-12 col-sm-6  col-md-4">';
                break;
            case 4:
                $div = '<div class="col-xs-12 col-sm-6  col-md-3">';
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }
        foreach($arr as $key => $val){
            $tmp .= $div.$val.'</div>';
        }
        $tmp = '<div class="row">'.$tmp.'</div>';
		return $tmp;
    }
    
    public static function headernotify($a, $topnav = false)
    {  
          
        $text = '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
        
        if(count($a) != 0){
            $text .= '<i class="bell fa fa-bell-o"></i><span class="label label-danger">'.count($a).'</span>';
        }else{
            $text .= '<i class="fa fa-bell-o"></i>';
        }
        
        $text .= '<span class="hidden-xs">แจ้งเตือน</span></a>';
        $text .= '<ul class="dropdown-menu">';
        // $text .= '<li class="header">รหัสกรรมการ</li>';
        $text .= '<li><ul class="menu">';
        
        $text1 = '';
        foreach($a as $b){
            $text1 .= '<li><a href="'.Url::to([$b[1]]).'" data-pjax ="0">';
            $text1 .= $b[0];                       
            $text1 .= '</a></li>';
        }        
        $text .= $text1.'</ul></li></ul>'; 
        $arr = [
            'label' => (count($a) != 0) ? '<i class="bell fa fa-bell-o"></i><span class="label label-danger">'.count($a).'</span>' : '<i class="fa fa-bell-o"></i>',
            'url' => '#',
            'options'=>['class'=>'dropdown notifications-menu'],
            'template' => '<a href="{url}" class="dropdown-toggle" data-toggle="dropdown">{label} <span class="hidden-xs">แจ้งเตือน</span></a>',
            'items' => [
                [   'label' => '<li><ul class="menu">'.$text1.'</ul></li>
                ',
                    'options'=>['class'=>'user-footer'],
                ],
            ]
        ];
        if($topnav === true){
            return $arr;
        }else{
            return $text;
        }          
    }

    public static function headerstaffnotify($a)
    {  
          
        $text = '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
        
        if(count($a) != 0){
            $text .= '<i class="fa fa-spinner fa-spin"></i><span class="label label-danger">'.count($a).'</span>';
        }else{
            $text .= '<i class="fa fa-spinner"></i>';
        }
        
        $text .= '<span class="hidden-xs">จัดการ</span></a>';
        $text .= '<ul class="dropdown-menu">';
        // $text .= '<li class="header">รหัสกรรมการ</li>';
        $text .= '<li><ul class="menu">';
        
        foreach($a as $b){
            $text .= '<li><a href="'.Url::to([$b[1]]).'" data-pjax ="0">';
            $text .= $b[0];                       
            $text .= '</a></li>';
        }        
        $text .= '</ul></li></ul>';   
        return $text;
    }
	public static function fileuploaddir($path = NULL){
		if(isset($path)){
			$dir = Yii::app()->basePath.$path;
		}else{
			$dir = Yii::app()->basePath.'/../files/courseEval/';
		}	  
		return $dir;
	}
	
	public static function isPagination($request_params){
        foreach($request_params as $key => $value){
            if (strpos($key, '_tog') !== false) {
                $param_val = $value;
            }
        }
        if($param_val == 'all'){ //returns empty array, which will show all data.
            return true;
        }

        return false;
    }

    public static function linenotify($program, $message, $onlyone = NULL)
    {

        //$mdl = Linetoken::find()->where('JSON_CONTAINS(program, \'["'.$program.'"]\')')->all();
        if(!empty($onlyone)){
            if(in_array($program, ['create', 'update','signout'])){
                $checkmdl = Linetoken::find()->where(['personID' => $onlyone])->all();
            }else{
                $checkmdl = Linetoken::find()->where(' JSON_CONTAINS(program, \'["'.$program.'"]\') and personID = '.$onlyone.' ')->all();
            }
        }else{
            $checkmdl = Linetoken::find()->where('JSON_CONTAINS(program, \'["'.$program.'"]\')')->all();
        }
        if(!empty($checkmdl)){
            foreach ($checkmdl as $key => $value){
    //            echo $value->Line_Token."\n";
                $line_api = 'https://notify-api.line.me/api/notify';
                //$line_token = 'YOUR-TOKEN';

                $queryData = array('message' => $message);
                $queryData = http_build_query($queryData, '', '&');
                $headerOptions = array(
                    'http' => array(
                        'method' => 'POST',
                        'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                            . "Authorization: Bearer " . $value->Line_Token . "\r\n"
                            . "Content-Length: " . strlen($queryData) . "\r\n",
                        'content' => $queryData
                    )
                );
                $context = stream_context_create($headerOptions);
                $result = file_get_contents($line_api, FALSE, $context);
    //            $res = json_decode($result);
    //            return $res; ขอ public IP กับ server หน่วยงาน
            }
        }
//        exit();
    }
	
	public static function budgetyear($input)
	{
		$inputdate = strtotime($input);
		$bdgtYstart = strtotime(date('Y') . '-10-1');
        if($inputdate >= $bdgtYstart){
            return date('Y')+1;
        }else{
            return date('Y');
        }
    }
    
	public static function checkontime($from, $to, $time = NULL)
	{
		$ref = (isset($time)) ? new \DateTime($time) : new \DateTime();
		$begin = new \DateTime($from);
		$end = new \DateTime($to);

		if ($ref >= $begin && $ref <= $end){
			return true;
        }else{
            return false;	
        }
	}
	/*public static function liststaff(){
		//isset($config['sqlOptions']) ? $sqlOptions = $config['sqlOptions'] : $sqlOptions = array();
		$listData = array();
		$model = DochubSystemProfiles::model()->with('dochubmainpersons')->findAll(array('condition'=>"dochubmainpersons.status =  1 AND t.user_type = 'Staff'"));
		foreach ($model as $key => $data) {
			$listData[$data->user_id] = $data->firstname.' '.$data->lastname;
		}
		return $listData;
	}*/
	public static function thaibath($number){
        $str = '';
        $priceFloor = floor($number);
        $dec = number_format($number - $priceFloor, 2) * 100;
        $str .= str_replace('​', '', Yii::$app->formatter->asSpellout($priceFloor));
        $str .= 'บาท';
        $str .= $dec > 0 ? ' '.str_replace('​', '', Yii::$app->formatter->asSpellout($dec)).'สตางค์' : 'ถ้วน';

        return $str;
	}

    public static function succalert($id, $message, $glyp = 'ok-circle')
    {
        return Yii::$app->getSession()->setFlash($id, [
            'type' => 'success',
            'duration' => 4000,
            'icon' => 'glyphicon glyphicon-'.$glyp,
            'message' => $message,
        ]);
    }
    public static function warnalert($id, $message, $glyp = 'exclamation-sign')
    {
        return Yii::$app->getSession()->setFlash($id, [
            'type' => 'warning',
            'duration' => 4000,
            'icon' => 'glyphicon glyphicon-'.$glyp,
            'message' => $message,
        ]);
    }
    public static function dangalert($id, $message, $glyp = 'remove-circle')
    {
        return Yii::$app->getSession()->setFlash($id, [
            'type' => 'danger',
            'duration' => 4000,
            'icon' => 'glyphicon glyphicon-'.$glyp,
            'message' => $message,
        ]);
    }
}
?>
