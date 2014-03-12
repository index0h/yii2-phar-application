<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

define('YII_DEBUG', true);
define('APP_HOST', $_SERVER['HTTP_HOST']);

$basePath = realpath(implode(DIRECTORY_SEPARATOR, [__DIR__, '..', '..'])) . DIRECTORY_SEPARATOR;

if (file_exists($basePath . 'app.phar') === true) {
    require 'phar://' . $basePath . 'app.phar' . DIRECTORY_SEPARATOR . 'bootstrap.php';
} else {
    require $basePath . 'app' . DIRECTORY_SEPARATOR . 'bootstrap.php';
}