<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Roman Levishchenko <index.0h@gmail.com>
 */
class AppAsset extends AssetBundle
{
    /** @type string {@inheritdoc} */
    public $basePath = '@webroot';

    /** @type string {@inheritdoc} */
    public $baseUrl = '@web';

    /** @type array {@inheritdoc} */
    public $css = ['css/site.css'];

    /** @type array {@inheritdoc} */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
