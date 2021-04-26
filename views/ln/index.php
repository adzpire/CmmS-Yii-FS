<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\fs\models\LinenotifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Linenotifies';
$this->params['breadcrumbs'][] = $this->title;
echo date('Y-m-d h:i:s');
echo Yii::$app->timezone;
echo Yii::$app->formatter->asDatetime(date('Y-m-d h:i:s'), 'php:Y-m-d h:i:s');
$time = new \DateTime('now');
echo Yii::$app->formatter->asDatetime($time);
?>
<div class="linenotify-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Linenotify', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'staffID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
