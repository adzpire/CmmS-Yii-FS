<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\USERINFOSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'USERID') ?>

    <?= $form->field($model, 'Badgenumber') ?>

    <?= $form->field($model, 'SSN') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'Gender') ?>

    <?php // echo $form->field($model, 'TITLE') ?>

    <?php // echo $form->field($model, 'PAGER') ?>

    <?php // echo $form->field($model, 'BIRTHDAY') ?>

    <?php // echo $form->field($model, 'HIREDDAY') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'CITY') ?>

    <?php // echo $form->field($model, 'STATE') ?>

    <?php // echo $form->field($model, 'ZIP') ?>

    <?php // echo $form->field($model, 'OPHONE') ?>

    <?php // echo $form->field($model, 'FPHONE') ?>

    <?php // echo $form->field($model, 'VERIFICATIONMETHOD') ?>

    <?php // echo $form->field($model, 'DEFAULTDEPTID') ?>

    <?php // echo $form->field($model, 'SECURITYFLAGS') ?>

    <?php // echo $form->field($model, 'ATT') ?>

    <?php // echo $form->field($model, 'INLATE') ?>

    <?php // echo $form->field($model, 'OUTEARLY') ?>

    <?php // echo $form->field($model, 'OVERTIME') ?>

    <?php // echo $form->field($model, 'SEP') ?>

    <?php // echo $form->field($model, 'HOLIDAY') ?>

    <?php // echo $form->field($model, 'MINZU') ?>

    <?php // echo $form->field($model, 'PASSWORD') ?>

    <?php // echo $form->field($model, 'LUNCHDURATION') ?>

    <?php // echo $form->field($model, 'MVERIFYPASS') ?>

    <?php // echo $form->field($model, 'PHOTO') ?>

    <?php // echo $form->field($model, 'Notes') ?>

    <?php // echo $form->field($model, 'privilege') ?>

    <?php // echo $form->field($model, 'InheritDeptSch') ?>

    <?php // echo $form->field($model, 'InheritDeptSchClass') ?>

    <?php // echo $form->field($model, 'AutoSchPlan') ?>

    <?php // echo $form->field($model, 'MinAutoSchInterval') ?>

    <?php // echo $form->field($model, 'RegisterOT') ?>

    <?php // echo $form->field($model, 'InheritDeptRule') ?>

    <?php // echo $form->field($model, 'EMPRIVILEGE') ?>

    <?php // echo $form->field($model, 'CardNo') ?>

    <?php // echo $form->field($model, 'Pin1') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
