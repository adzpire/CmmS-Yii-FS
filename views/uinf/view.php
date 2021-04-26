<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\fs\models\USERINFO */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Userinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userinfo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Badgenumber], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Badgenumber], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'USERID',
            'Badgenumber',
            'SSN',
            'Name',
            'Gender',
            'TITLE',
            'PAGER',
            'BIRTHDAY',
            'HIREDDAY',
            'street',
            'CITY',
            'STATE',
            'ZIP',
            'OPHONE',
            'FPHONE',
            'VERIFICATIONMETHOD',
            'DEFAULTDEPTID',
            'SECURITYFLAGS',
            'ATT',
            'INLATE',
            'OUTEARLY',
            'OVERTIME:datetime',
            'SEP',
            'HOLIDAY',
            'MINZU',
            'PASSWORD',
            'LUNCHDURATION',
            'MVERIFYPASS',
            'PHOTO',
            'Notes',
            'privilege',
            'InheritDeptSch',
            'InheritDeptSchClass',
            'AutoSchPlan',
            'MinAutoSchInterval',
            'RegisterOT',
            'InheritDeptRule',
            'EMPRIVILEGE',
            'CardNo',
            'Pin1',
        ],
    ]) ?>

</div>
