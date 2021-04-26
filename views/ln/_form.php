<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\Linenotify */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linenotify-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staffID')->textInput() ?>
	
    <?= $form->field($model, 'last_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
