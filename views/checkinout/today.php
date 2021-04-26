<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\fs\models\CHECKINOUTSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Checkinouts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkinout-index">

    <h4 class='text-center'><?= Html::encode('รายการแสกนวันที่ ').\Yii::$app->formatter->asDate(date('Y-m-d'), "long"); ?></h4>
	 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CHECKTIME',
        ],
    ]); ?>
</div>
