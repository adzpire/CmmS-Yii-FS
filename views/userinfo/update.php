<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\USERINFO */

$this->title = 'Update Userinfo: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Userinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->Badgenumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="userinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
