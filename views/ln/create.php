<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\Linenotify */

$this->title = 'Create Linenotify';
$this->params['breadcrumbs'][] = ['label' => 'Linenotifies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linenotify-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
