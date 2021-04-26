<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\fs\models\USERINFOSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userinfos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userinfo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Userinfo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'USERID',
            'Badgenumber',
            'SSN',
            'Name',
            'Gender',
            // 'TITLE',
            // 'PAGER',
            // 'BIRTHDAY',
            // 'HIREDDAY',
            // 'street',
            // 'CITY',
            // 'STATE',
            // 'ZIP',
            // 'OPHONE',
            // 'FPHONE',
            // 'VERIFICATIONMETHOD',
            // 'DEFAULTDEPTID',
            // 'SECURITYFLAGS',
            // 'ATT',
            // 'INLATE',
            // 'OUTEARLY',
            // 'OVERTIME:datetime',
            // 'SEP',
            // 'HOLIDAY',
            // 'MINZU',
            // 'PASSWORD',
            // 'LUNCHDURATION',
            // 'MVERIFYPASS',
            // 'PHOTO',
            // 'Notes',
            // 'privilege',
            // 'InheritDeptSch',
            // 'InheritDeptSchClass',
            // 'AutoSchPlan',
            // 'MinAutoSchInterval',
            // 'RegisterOT',
            // 'InheritDeptRule',
            // 'EMPRIVILEGE',
            // 'CardNo',
            // 'Pin1',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
