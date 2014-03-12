<?php
/**
 * @link      https://github.com/index0h/yii2-phar-application
 * @copyright Copyright (c) 2014 Roman Levishchenko <index.0h@gmail.com>
 * @license   https://raw.github.com/index0h/yii2-phar-application/master/LICENSE
 */

/**
 * @author Roman Levishchenko <index.0h@gmail.com>
 */
class m000000_000000_basic extends \yii\db\Migration
{
    /**
     * @inheritdoc
     *
     * @return bool|void
     */
    public function up()
    {
        $this->execute(file_get_contents(\Yii::getAlias('@app/migrations/dump.sql')));
    }

    /**
     * @inheritdoc
     *
     * @return bool
     */
    public function down()
    {
        echo "m140311_085601_basic cannot be reverted.\n";
        return false;
    }
}
