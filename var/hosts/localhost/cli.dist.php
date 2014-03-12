<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

return yii\helpers\ArrayHelper::merge(
    require __DIR__ . DIRECTORY_SEPARATOR . 'base.dist.php',
    [
        'controllerNamespace' => 'app\\commands',
        'modules' => [
            'phar' => [
                'class' => 'index0h\\phar\\Module',
                'path' => '@root/app.phar',
                'signature' => false,
                'ignore' => ['/^\..+/s'],
                'folders' => [
                    '@app/assets',
                    '@app/commands',
                    '@app/controllers',
                    '@app/migrations',
                    '@app/models',
                    '@app/vendor',
                    '@app/views',
                ],
                'files' => ['@app/bootstrap.php'],
                'components' => [
                    'fixer' => [
                        'class' => 'index0h\\phar\\components\\php\\Fixer',
                        'replace' => [
                            '/(\s)realpath\(/us' => '\1\\index0h\\phar\\helpers\\FileHelper::realPath(',
                            '/(\s)is_dir\(/us' => '\1\\index0h\\phar\\helpers\\FileHelper::isDir(',
                            '/(\s)chdir\(/us' => '\1trim(',
                        ]
                    ]
                ]
            ]
        ]
    ]
);
