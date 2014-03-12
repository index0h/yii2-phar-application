<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

file_put_contents(__DIR__ . '/var/runtime/server.pid', getmypid());
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/var/web/index.php';
require_once __DIR__ . '/var/web/index.php';
