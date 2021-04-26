<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'ระบบแจ้งผลการแสกนลายนิ้วมือเข้างาน คณะวิทยาการสื่อสาร มอ. ปัตตานี',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            /* ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],*/
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    Html::Icon('log-out') . 'Logout (' . Yii::$app->user->identity->SSN . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ) 
        ],
    ]);
    NavBar::end();
    ?>
	
    <div class="container">
	<?php if(Yii::$app->session->hasFlash('alert')):?>
		<?= Alert::widget([
		'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
		'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
		])?>
	<?php endif; ?>
		  <?php if(isset($this->blocks['version'])){
						echo $this->blocks['version'];
				}
			?>				
        <?php /*  = Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) */ ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p>© 2016-<?php echo date('Y'); ?> PSU YII DEV 
				<span class="label label-danger">
				<?php echo \Yii::$app->params['version'];	?>
				</span>
            <?php echo '   พบปัญหาในการใช้งาน ติดต่อ - '.Html::icon('envelope'); ?> :  <?php echo Html::mailto('อับดุลอาซิส ดือราแม', 'abdul-aziz.d@psu.ac.th'); ?><?php echo ' '.Html::icon('earphone').' : '.Yii::t( 'app', 'โทรศัพท์ภายใน : 2618'); ?>
        </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
