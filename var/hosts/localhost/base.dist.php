<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

define('YII_DEBUG', true);

return [
    'preload' => ['log'],
    'modules' => [
        'gii' => 'yii\\gii\\Module'
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\\caching\\FileCache'
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\\log\\FileTarget',
                    'levels' => ['error', 'warning'],
                    'logFile' => \Yii::getAlias('@var/logs/app.log')
                ],
            ],
        ]
    ]
];