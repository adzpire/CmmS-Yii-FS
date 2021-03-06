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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Checkinout', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'Badgenumber',
				[
					'attribute' => 'Badgenumber',
					'value' => 'userInfo.Name',
					'label' => $searchModel->attributeLabels()['Badgenumber'],
					//'filter' => \Person::ppStList,
				],
            'CHECKTIME',
            'CHECKTYPE',
            'VERIFYCODE',
            // 'SENSORID',
            // 'WorkCode',
            // 'sn',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
