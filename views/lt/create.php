<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\Linetoken */

$this->title = 'บันทึก Line Token ';
$this->params['breadcrumbs'][] = ['label' => 'Linetokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linetoken-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
		'usermdl' => $usermdl,
    ]) ?>

</div>
