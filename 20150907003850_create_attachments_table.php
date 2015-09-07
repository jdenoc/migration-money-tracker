<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateAttachmentsTable extends AbstractMigration
{
    /**
     * Migrate Up
     * Create `attachments` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('attachments', array('id'=>false, 'primary_key'=>'id'));
        $table->addColumn('id', 'integer', array('signed'=>false, 'identity'=>true));
        $table->addColumn('entry_id', 'integer', array('signed'=>false));
        $table->addColumn('attachment', 'string');
        $table->addColumn('ext', 'string', array('limit'=>10));
        $table->addIndex(array('entry_id'));
        $table->save();
    }

    /**
     * Migrate Down
     * Drop `attachments` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->dropTable('attachments');
    }
}
