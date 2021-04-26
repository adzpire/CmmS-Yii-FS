<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\CHECKINOUT */

$this->title = $model->Badgenumber;
$this->params['breadcrumbs'][] = ['label' => 'Checkinouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="checkinout-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Badgenumber' => $model->Badgenumber, 'CHECKTIME' => $model->CHECKTIME], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Badgenumber' => $model->Badgenumber, 'CHECKTIME' => $model->CHECKTIME], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'Badgenumber',
				[
					'label' => $model->attributeLabels()['Badgenumber'],
					'value' => $model->userInfo->Name,
					//'format' => ['date', 'long']
				],
            'CHECKTIME',
            'CHECKTYPE',
            'VERIFYCODE',
            'SENSORID',
            'WorkCode',
            'sn',
        ],
    ]) ?>

</div>
