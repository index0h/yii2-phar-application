<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var string        $content
 *
 * @author Roman Levishchenko <index.0h@gmail.com>
 */
AppAsset::register($this);
$navigationBar = [
    'brandLabel' => \Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-inverse navbar-fixed-top']
];
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>

<div class="wrap">
    <?= NavBar::widget($navigationBar); ?>

    <div class="container">
        <?= $content; ?>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= \Yii::$app->name; ?> <?= date('Y'); ?></p>
        <p class="pull-right"><?= Yii::powered(); ?></p>
    </div>
</footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
