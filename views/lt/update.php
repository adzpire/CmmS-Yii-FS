<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\Linetoken */

$this->title = 'Update Linetoken: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Linetokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="linetoken-update">

    <h1><?= Html::encode($this->title).' '.$model->userInfo->Name;  ?></h1>
	<?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
		'ulist' => $ulist,
    ]) ?>

</div>
