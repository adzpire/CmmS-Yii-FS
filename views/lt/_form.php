<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\Linetoken */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="linetoken-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'ID')->textInput() ?>

    <?php // $form->field($model, 'staffID')->textInput() ?>
	
	<?php /* if($model->isNewRecord){
				echo $form->field($model, 'staffID')->dropDownList(
				$ulist
				)->label('ชื่อ');
			} */
	?>

	<div class="form-group field-linetoken-pp_user">
		<label class="control-label" for="linetoken-pp_user">PSU Passport</label>
		<p><?php echo $usermdl->Name; ?></p>
	</div>

    <?= $form->field($model, 'Line_Token')->textInput() ?>
	
	<?php //echo $form->field($model, 'PP_user')->textInput(['placeholder'=>'ตัวอย่าง เช่น abdul-aziz.d']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'อัพเดต', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
