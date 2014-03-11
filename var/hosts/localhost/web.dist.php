<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

return yii\helpers\ArrayHelper::merge(
    require __DIR__ . DIRECTORY_SEPARATOR . 'base.dist.php',
    [
        'preload' => ['log', 'debug'],
        'controllerNamespace' => 'app\\controllers',
        'modules' => [
            'debug' => 'yii\\debug\\Module'
        ]
    ]
);
