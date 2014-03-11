<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

namespace app\controllers;

use yii\web\Controller;
use Yii;

/**
 * @author Roman Levishchenko <index.0h@gmail.com>
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}