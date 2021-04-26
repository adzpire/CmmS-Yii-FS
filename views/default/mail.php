<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\Linenotify */

$this->title = 'send mail';
?>
<div class="linenotify-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="linenotify-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal', 
			'fieldConfig' => [
				'horizontalCssClasses' => [
					'label' => 'col-md-3',
					'wrapper' => 'col-sm-9',
				],
			],
			//'validateOnChange' => true,
			//'enableAjaxValidation' => true,
			//	'enctype' => 'multipart/form-data'
			]); ?>

    <div class="form-group">
        <label class="control-label col-sm-3">ผู้ส่ง</label>
        <div class="col-sm-9">
            <p> <?php echo Yii::$app->user->identity->email; ?></p>
        </div>
    </div>
   
    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'sendto')->textInput() ?>

    <?= $form->field($model, 'subject')->textInput() ?>

    <?= $form->field($model, 'body')->textArea() ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('send').' ส่งเมล์', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>

</div>