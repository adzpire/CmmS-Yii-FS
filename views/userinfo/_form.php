<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\USERINFO */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userinfo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Badgenumber')->textInput() ?>

    <?= $form->field($model, 'SSN')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput() ?>

    <?= $form->field($model, 'Gender')->textInput() ?>

    <?= $form->field($model, 'TITLE')->textInput() ?>

    <?= $form->field($model, 'PAGER')->textInput() ?>

    <?= $form->field($model, 'BIRTHDAY')->textInput() ?>

    <?= $form->field($model, 'HIREDDAY')->textInput() ?>

    <?= $form->field($model, 'street')->textInput() ?>

    <?= $form->field($model, 'CITY')->textInput() ?>

    <?= $form->field($model, 'STATE')->textInput() ?>

    <?= $form->field($model, 'ZIP')->textInput() ?>

    <?= $form->field($model, 'OPHONE')->textInput() ?>

    <?= $form->field($model, 'FPHONE')->textInput() ?>

    <?= $form->field($model, 'VERIFICATIONMETHOD')->textInput() ?>

    <?= $form->field($model, 'DEFAULTDEPTID')->textInput() ?>

    <?= $form->field($model, 'SECURITYFLAGS')->textInput() ?>

    <?= $form->field($model, 'ATT')->textInput() ?>

    <?= $form->field($model, 'INLATE')->textInput() ?>

    <?= $form->field($model, 'OUTEARLY')->textInput() ?>

    <?= $form->field($model, 'OVERTIME')->textInput() ?>

    <?= $form->field($model, 'SEP')->textInput() ?>

    <?= $form->field($model, 'HOLIDAY')->textInput() ?>

    <?= $form->field($model, 'MINZU')->textInput() ?>

    <?= $form->field($model, 'PASSWORD')->passwordInput() ?>

    <?= $form->field($model, 'LUNCHDURATION')->textInput() ?>

    <?= $form->field($model, 'MVERIFYPASS')->textInput() ?>

    <?= $form->field($model, 'PHOTO')->textInput() ?>

    <?= $form->field($model, 'Notes')->textInput() ?>

    <?= $form->field($model, 'privilege')->textInput() ?>

    <?= $form->field($model, 'InheritDeptSch')->textInput() ?>

    <?= $form->field($model, 'InheritDeptSchClass')->textInput() ?>

    <?= $form->field($model, 'AutoSchPlan')->textInput() ?>

    <?= $form->field($model, 'MinAutoSchInterval')->textInput() ?>

    <?= $form->field($model, 'RegisterOT')->textInput() ?>

    <?= $form->field($model, 'InheritDeptRule')->textInput() ?>

    <?= $form->field($model, 'EMPRIVILEGE')->textInput() ?>

    <?= $form->field($model, 'CardNo')->textInput() ?>

    <?= $form->field($model, 'Pin1')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
