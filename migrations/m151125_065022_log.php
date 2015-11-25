<?php

use yii\db\Schema;
use yii\db\Migration;

class m151125_065022_log extends Migration
{
    const TBL_NAME = '{{%log}}';
    public function safeUp(){
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable(self::TBL_NAME,[
            'id'    => Schema::TYPE_PK,
            'level' => Schema::TYPE_STRING . '(128) default "0"',
            'ip'    => Schema::TYPE_INTEGER. '(11) NOT NULL',
            'data'  => Schema::TYPE_TEXT.'(0)',
            'tag'   => Schema::TYPE_STRING . '(128) default "INFO"',
            'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
        ],$tableOptions);
        $this->createIndex('level',self::TBL_NAME,['level']);
        $this->createIndex('tag',self::TBL_NAME,['tag']);
    }
    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
    }
}
