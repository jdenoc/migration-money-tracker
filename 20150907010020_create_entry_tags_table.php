<?php

use Phinx\Migration\AbstractMigration;

class CreateEntryTagsTable extends AbstractMigration
{
    /**
     * Migrate Up
     * Create `entry_tags` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('entry_tags', array('id'=>false, 'primary_key'=>'id'));
        $table->addColumn('id', 'integer', array('identity'=>true, 'signed'=>false));
        $table->addColumn('entry_id', 'integer', array('signed'=>false));
        $table->addColumn('tag_id', 'integer', array('signed'=>false));
        $table->addColumn('stamp', 'timestamp', array('default'=>'CURRENT_TIMESTAMP', 'update'=>'CURRENT_TIMESTAMP'));
        $table->save();
    }

    /**
     * Migrate Down
     * Drop `entry_tags` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->dropTable('entry_tags');
    }

}
