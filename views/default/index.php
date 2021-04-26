<?php

use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\fs\models\CHECKINOUTSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 60000);
});
JS;
$this->registerJs($script);

$tmp = file_get_contents('https://www.commsci.psu.ac.th/office/person/rest/staff');
$staffs = json_decode($tmp, true);
?>

<div class="checkinout-index">

	<h1>
		<?= Html::icon('hand-up').' '.'รายการสแกนประจำวันที่ '.\Yii::$app->formatter->asDate(date('Y-m-d'), "long"); ?>
	</h1>
	<mark>ระบบจะรีเฟรชข้อมูลทุกๆ 2 นาที ตั้งแต่เวลา 8.00 - 8.45 น. กด รีเฟรช เพื่อดูข้อมูลล่าสุด</mark>

	<?php Pjax::begin(); ?>
	<div class="row">
		<div class="col-md-4 text-center">
			<h1>ลงทะเบียน LINE alert</h1>
			<?= Html::a(Html::icon('check'), ['lt/'], ['class' => 'btn btn-lg btn-danger btn-block', 'data-pjax' => 0]);?>
		</div>
		<div class="col-md-4 text-center">
			
			<h1>เวลาเซิฟเวอร์: <?= \Yii::$app->formatter->asTime(time(), "short"); ?></h1>
			<?= Html::a(Html::icon('refresh').' '."รีเฟรช", [''], ['class' => 'btn btn-lg btn-primary btn-block', 'id' => 'refreshButton']);?>
			
		</div>
		<div class="col-md-4">
			<table class="table table-bordered table-striped">
				<thead> 
					<tr> 
						<th class="text-center">หมายเหตุ</th> 
						<th></th> 
					</tr> 
				</thead>
				<tbody> 
					<tr>
						<td class="success"></td>
						<td>เข้าตามเวลา(ก่อนเวลา 8.40 น.)</td>
					</tr>
					<tr>
						<td class="warning"></td>
						<td>มาทำงาน(หลังเวลา 8.40 น.)</td>
					</tr>
					<tr>
						<td class="danger"></td>
						<td>ยังไม่สแกน/ ลา / ไปราชการ</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		  'rowOptions' => function($model){
						if($model::getIntime($model->Badgenumber)){
							return ['class' => 'success'];
						}elseif($model::getToday($model->Badgenumber)){
							return ['class' => 'warning'];
						}else{
							return ['class' => 'danger'];
						}
		  },
        'columns' => [
            [
					'class' => 'yii\grid\SerialColumn',
					'headerOptions' => [
							'width' => '50px',
						],
					'contentOptions' => [
                        'class'=>'text-center',
                    ],
				],

            //'id',
				[
					'attribute' => 'Badgenumber',
					'label' => 'หมายเลขที่เครื่อง',
					'contentOptions' => [
							'class'=>'text-center',
					  ],
					'filter' => false,
					'headerOptions' => [
						'width' => '50px',
					],
				],
				[
					  'attribute' => 'image',
					  'label' => 'รูปภาพ',
					  'format' => ['image',['class'=>'img-responsive img-circle']], 
							'headerOptions' => [
							'width' => '100px',
						],
						'contentOptions' => [
                        'class'=>'text-center',
                    ],
					  'value' => function($model) use ($staffs) { 
							$key = array_search($model->SSN, array_column($staffs, 'username'));
							//if($key !== null ){
							if($model->SSN !== '' ){
								return $staffs[$key]['avatar']; 
							}
							//var_dump($key);
							return null;
						},					  
				 ],
				[
					'attribute' => 'ppStName',
					'value' => 'Name',
					'filter' => false,
					'label' => 'ชื่อ นามสกุล',
					//'filter' => \Person::ppStList,
				],
            //'CHECKTIME',
				[
					  'attribute' => 'CHECKTIME',
					  'format' => 'raw',
					  'filter' => false,
					  'headerOptions' => [
							'width' => '100px',
							'class'=>'text-center',
						],
						'contentOptions' => [
                        'class'=>'text-center',
                    ],
					  'label' => 'ภายในเวลา',
					  'value' => function ($model) {
								if($model::getIntime($model->Badgenumber)){
									return Html::icon('ok');
								}else{
									return Html::icon('remove');
								}
						  //return $model->fldSize->fld_width . 'x' . $model->fldSize->fld_height;
					 },
				 ],
				 [
					  'attribute' => 'CHECKTIME',
					  'format' => 'raw',
					  'filter' => false,
					  'headerOptions' => [
							'width' => '80px',
							'class'=>'text-center',
						],
						'contentOptions' => [
                        'class'=>'text-center',
                    ],
					  'label' => 'วันนี้',
					  'value' => function ($model) {
								if($model::getToday($model->Badgenumber)){
									return Html::icon('ok');
								}else{
									return Html::icon('remove');
								}
						  //return $model->fldSize->fld_width . 'x' . $model->fldSize->fld_height;
					 },
				 ],
            //'CHECKTYPE',
            //'VERIFYCODE',
            // 'SENSORID',
            // 'WorkCode',
            // 'sn',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	 <?php Pjax::end(); ?>
	 
</div>
