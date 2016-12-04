<?php

use Phinx\Migration\AbstractMigration;

class ReplaceAttachmentsColumnIdWithUuid extends AbstractMigration
{

    /**
     * Migrate Up
     * Create a new attachments table, so that primary keys can be rebuild
     * Transfer data from original attachments table to new attachments table
     * Drop original attachments table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     */
    public function up(){
        // Create new_attachments table
        $new_table = $this->table('new_attachments', array('id'=>false, 'primary_key'=>'uuid'));
        $new_table->addColumn('uuid', 'char', array('limit'=>36));
        $new_table->addColumn('entry_id', 'integer', array('signed'=>false));
        $new_table->addColumn('attachment', 'string');
        $new_table->addColumn('stamp', 'timestamp', array('default'=>'CURRENT_TIMESTAMP'));
        $new_table->addIndex('entry_id');
        $new_table->save();

        // migrate data from attachments to new_attachments
        $this->execute(
            "INSERT INTO new_attachments (
                SELECT uid, entry_id, attachment, stamp FROM attachments
            )"
        );

        // drop attachments table
        $this->dropTable('attachments');

        // rename new_attachments to attachments
        $new_table->rename('attachments');
    }

    public function down(){
        // create original_attachments table
        $original_table = $this->table('original_attachments', array('id'=>false, 'primary_key'=>'id'));
        $original_table->addColumn('id', 'integer', array('signed'=>false, 'identity'=>true));
        $original_table->addColumn('entry_id', 'integer', array('signed'=>false));
        $original_table->addColumn('attachment', 'string');
        $original_table->addColumn('uid', 'string', array('limit'=>50, 'null' => true));
        $original_table->addColumn('stamp', 'timestamp', array('default'=>'CURRENT_TIMESTAMP'));
        $original_table->addIndex('entry_id');
        $original_table->addIndex('uid', array('unique'=>true));
        $original_table->save();

        // migrate data from attachments to original_attachments
        $this->execute(
            "INSERT INTO original_attachments (
                SELECT null, entry_id, attachment, uuid, stamp FROM attachments
            )"
        );

        // drop attachments table
        $this->dropTable('attachments');

        // rename new_attachments to attachments
        $original_table->rename('attachments');
    }
}
