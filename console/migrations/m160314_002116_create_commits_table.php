<?php

use yii\db\Migration;

class m160314_002116_create_commits_table extends Migration
{
    public function up()
    {
        $this->createTable('commits', [
            'id' => $this->primaryKey(),
            'hash' => $this->string(40)->unique(),
            'subject' => $this->text(),
            'commit_time' => $this->integer(),
            'author_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('commits');
    }
}
