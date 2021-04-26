<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\CHECKINOUT */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="checkinout-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Badgenumber')->textInput() ?>

    <?= $form->field($model, 'CHECKTIME')->textInput() ?>

    <?= $form->field($model, 'CHECKTYPE')->textInput() ?>

    <?= $form->field($model, 'VERIFYCODE')->textInput() ?>

    <?= $form->field($model, 'SENSORID')->textInput() ?>

    <?= $form->field($model, 'WorkCode')->textInput() ?>

    <?= $form->field($model, 'sn')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
