<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\CHECKINOUTSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="checkinout-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Badgenumber') ?>

    <?= $form->field($model, 'CHECKTIME') ?>

    <?= $form->field($model, 'CHECKTYPE') ?>

    <?= $form->field($model, 'VERIFYCODE') ?>

    <?php // echo $form->field($model, 'SENSORID') ?>

    <?php // echo $form->field($model, 'WorkCode') ?>

    <?php // echo $form->field($model, 'sn') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
