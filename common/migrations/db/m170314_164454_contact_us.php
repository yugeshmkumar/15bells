<?php

use yii\db\Schema;
use yii\db\Migration;

class m170314_164454_contact_us extends Migration {

    private $_table = "contact_us";

    public function up() {
        $this->createTable($this->_table, [
            'mail_id' => "integer primary key auto_increment",
            "full_name" => "varchar(250)",
            "email" => "varchar(250)",
            "contact_number" => "varchar(14)",
            "message" => "text",
            "is_active" => "tinyint",
            "created_at" => "timestamp"
        ]);
    }

    public function down() {
        $this->dropTable($this->_table);
    }

}
