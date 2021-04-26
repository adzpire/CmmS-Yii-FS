<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\UserPSUPP */

$this->title = 'Create User Psupp';
$this->params['breadcrumbs'][] = ['label' => 'User Psupps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-psupp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
