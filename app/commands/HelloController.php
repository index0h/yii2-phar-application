<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

namespace app\commands;

use yii\console\Controller;

/**
 * Hello command writes your message to stdout.
 *
 * @author Roman Levishchenko <index.0h@gmail.com>
 */
class HelloController extends Controller
{
    /**
     * Hello World.
     *
     * @param string $message Output string.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }
}