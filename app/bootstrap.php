<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

if (\Phar::running() === '') {
    $basePath = __DIR__ . DIRECTORY_SEPARATOR . '..';
    $appPath = $basePath . DIRECTORY_SEPARATOR . 'app';
} else {
    $basePath = dirname(\Phar::running(false));
    $appPath = \Phar::running();
}

require_once implode(DIRECTORY_SEPARATOR, [$appPath, 'vendor', 'yiisoft', 'yii2', 'Yii.php']);
require_once implode(DIRECTORY_SEPARATOR, [$appPath, 'vendor', 'autoload.php']);

\Yii::setAlias('@root', $basePath);
\Yii::setAlias('@base', $appPath);
\Yii::setAlias('@var', \Yii::getAlias('@root/var'));
\Yii::setAlias('@hosts', \Yii::getAlias('@var/hosts/' . APP_HOST));
\Yii::setAlias('@runtime/logs', \Yii::getAlias('@var/logs'));
\Yii::setAlias('@runtime/cache', \Yii::getAlias('@var/cache'));

$configFilePrefix = \Yii::getAlias('@hosts/' . ((PHP_SAPI === 'cli') ? 'cli' : 'web'));

$configDistFile = (file_exists($configFilePrefix . '.dist.php')) ? require($configFilePrefix . '.dist.php') : [];
$configFile = (file_exists($configFilePrefix . '.php')) ? require($configFilePrefix . '.php') : [];
$composer = json_decode(file_get_contents($basePath . DIRECTORY_SEPARATOR . 'composer.json'));

$config = [
    'id' => APP_HOST,
    'version' => $composer->version,
    'name' => $composer->name,
    'basePath' => \Yii::getAlias('@base'),
    'viewPath' => \Yii::getAlias('@base/views'),
    'runtimePath' => \Yii::getAlias('@var/runtime'),
    'vendorPath' => \Yii::getAlias('@base/vendor'),
    'extensions' => require(Yii::getAlias('@base/vendor/yiisoft/extensions.php'))
];

$config = yii\helpers\ArrayHelper::merge($config, $configDistFile, $configFile);

if (PHP_SAPI === 'cli') {
    $application = new yii\console\Application($config);
    $exitCode = $application->run();
    exit($exitCode);
} else {
    (new yii\web\Application($config))->run();
}