<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\UserPSUPP */

$this->title = 'Update User Psupp: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'User Psupps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-psupp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
