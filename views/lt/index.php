<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\fs\models\LinetokenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการ line token';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linetoken-index">
<?php 
/* echo Alert::widget([
    'options' => [
        'class' => 'alert-danger',
    ],
    'body' => 'ขั้นตอน >> (1) สมัคร line notify ตามคำแนะนำด้านขวา จะได้ token(รหัส)(2) กรอก token(รหัส) ที่ได้จากข้อ [1] เมื่ลงทะเบียน',
]); */
?>
<h2 class='jumbotron well'>
	<p class="text-danger"><< ขั้นตอน >></p>
	<p>(1) สมัคร line notify ตามขั้นตอนคำแนะนำ จะได้ token(รหัส)</p>
	<p>(2) กรอก token(รหัส) ที่ได้จากข้อ [1] มาลงทะเบียน</p>
	<p class="text-danger">เวลาแจ้งเตือน ในแต่ละวันทำการ(จันทร์-ศุกร์)มีดังนี้</p>
	<p>เช้า := 8:00, 8:28, 8:33, 8:36, 8:41, 8:46, 9:01 </p>
	<p>บ่าย := 12:45, 13:01</p>
	<p class="text-success">การแจ้งเตือนจะหยุดหลังจากที่มีพบการแสกนแล้ว</p>
</h2>
<h2>วิธีสมัคร LINE Notification เพื่อสร้าง Token เพื่อแจ้งเตือน</h2>
<!--<h4>เข้า LINE Notify Login เพื่อสร้าง Token และ Bot</h4> -->
<h3>1. เข้าระบบที่&nbsp;<a href="https://notify-bot.line.me/" target="_new">https://notify-bot.line.me/</a></h3>

<p><img class="img-responsive img-thumbnail" alt="" src="http://comm-sci.pn.psu.ac.th/uploads/anda-cms/content/images/abdul-aziz.d/1.png" /></p>

<h3>2. จากนั้นทำการ <strong>login ด้วย email</strong> ที่ลงทะเบียนกับ line account ที่ใช้อยู่</h3>


<p><img class="img-responsive img-thumbnail" alt="" src="http://comm-sci.pn.psu.ac.th/uploads/anda-cms/content/images/abdul-aziz.d/2.png" /></p>
<h3>3. ไปที่ เมนูขวาบน คลิ้กที่ชื่อ account เลือก <strong>หน้าของฉัน</strong></h3>
<p><img  class="img-responsive img-thumbnail" alt="" src="http://comm-sci.pn.psu.ac.th/uploads/anda-cms/content/images/abdul-aziz.d/3.png" /></p>

<h3>4. ด้านล่างส่วนของ ออก Access Token(สำหรับผู้พัฒนา) คลิกที่ปุ่ม <strong>ออก token</strong></h3>

<p><img class="img-responsive img-thumbnail" alt="" src="http://comm-sci.pn.psu.ac.th/uploads/anda-cms/content/images/abdul-aziz.d/4.png" /></p>
<h3 class='text-danger'>5. จากนั้นใส่ชื่อ <strong>WorkCheckIn</strong> และเลือก <strong>รับการแจ้งเตือนแบบตัวต่อตัวจาก LINE Notify (1-on-1 chat with LINE Notify)</strong> จากนั้นกดปุ่ม Generate Token</h3>

<p><img class="img-responsive img-thumbnail" alt="" src="http://comm-sci.pn.psu.ac.th/uploads/anda-cms/content/images/abdul-aziz.d/5.png" /></p>

<h3>6. จะปรากฏ Popup รหัส Token ให้กด <strong>คัดลอก</strong></h3>

<p><img class="img-responsive img-thumbnail" alt="" src="http://comm-sci.pn.psu.ac.th/uploads/anda-cms/content/images/abdul-aziz.d/6.png" /></p>

<h3 class='text-danger'>7.  แล้วเอามาลงทะเบียนด้านล่างนี้</h3>
	<p class='jumbotron'>
        <?= Html::a('ลงทะเบียนรายชื่อ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  <h3><?= 'รายการที่ลงทะเบียนใช้งานแล้ว' ?></h3>
<?php  Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			[
				'attribute' => 'ID',
				'headerOptions' => [
					'width' => '100px',
				],
			],
            //'staffID',
			[
				'attribute' => 'staffID',
				'value' => 'userInfo.Name'
            ],
            //'Line_Token',

             [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view}',
				'buttons' => [
                'view' => function ($url, $model, $key) {
                    return Html::a(' ดูรายละเอียด ', Url::to(['view', 'id'=>$model->ID]));
					},
				],
				'headerOptions' => [
					'width' => '100px',
				],
			] /**/
        ],
    ]);  
	Pjax::end();/**/ ?>


	
	
</div>
