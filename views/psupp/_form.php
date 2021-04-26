<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\UserPSUPP */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-psupp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staffID')->textInput() ?>

    <?= $form->field($model, 'PsuPP')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
