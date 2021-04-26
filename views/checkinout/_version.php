<?php
/**
 * Created by PhpStorm.
 * User: cmmsNetAdmin
 * Date: 8/1/2559
 * Time: 20:10
 */
use yii\helpers\Url;
use yii\bootstrap\Html;
use yii\bootstrap\Alert;
use yii\bootstrap\Button;

$test = Url::remember(Url::current());
//echo $test;
?>
<?php
Alert::begin([
    'options' => [
        'class' => 'alert-info',
    ],
]);
?>
<strong><?php echo Html::icon('info-sign'); ?> -: มีการอัพเดตระบบ :- </strong>
<?php echo Button::widget([
    'label' => 'แสดงรายละเอียด',
    'options' => [
        'class' => 'btn-xs btn-primary',
        'data-toggle' => 'collapse',
        'data-target' => '#demo',
    ],
]);
echo Html::a('ปิดการแจ้งเตือน 30 วัน', ['/checkinout/setvercookies'],
    [
        'class' => 'btn btn-xs btn-danger',
    ]);
?>

<div id="demo" class="collapse">
    <h4>version <?php echo $version; ?></h4>
    <ul>
        <li>พัฒนาระบบ ทดสอบการใช้งาน</li>
    </ul>
</div>

<?php Alert::end(); ?>