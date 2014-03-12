<?php
/**
 * Codeception PHP script runner inside phar archive.
 *
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

define('ROOT_PATH', 'phar://' . implode(DIRECTORY_SEPARATOR, [__DIR__, 'app.phar']));

require __DIR__ . DIRECTORY_SEPARATOR . '.test.php';

echo "\nFiles required in tests not from phar:\n\n";
$requireFiles = get_required_files();

foreach ($requireFiles as $file) {
    if ((strpos($file, ROOT_PATH) === false)) {
        echo " - " . substr($file, strlen(__DIR__) + 1) . "\n";
    }
}
echo "\n";