<?php

use Phinx\Migration\AbstractMigration;

class CreateTagsTable extends AbstractMigration
{
    /**
     * Migrate Up
     * Create `tags` tables
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('tags', array('id'=>false, 'primary_key'=>'id'));
        $table->addColumn('id', 'integer', array('signed'=>false, 'identity'=>true));
        $table->addColumn('tag', 'string', array('limit'=>50));
        $table->addIndex(array('tag'));
        $table->save();
    }

    /**
     * Migrate Down
     * Drop `tags` tables
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->dropTable('tags');
    }
}
