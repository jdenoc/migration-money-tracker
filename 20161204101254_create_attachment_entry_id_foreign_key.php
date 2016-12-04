<?php

use Phinx\Migration\AbstractMigration;

class CreateAttachmentEntryIdForeignKey extends AbstractMigration
{
    /**
     * Migrate Up
     * Drops existing index on attachments.entry_id
     * Creates a foreign key on the attachments.entry_id column linking it to the entries.id column
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('attachments');
        $table->removeIndex(array('entry_id'));
        $table->addForeignKey('entry_id', 'entries', array('id'), array('constraint'=>'fk_attachments_entry_id', 'delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'));
        $table->save();
    }

    public function down(){
        $table = $this->table('attachments');
        $table->dropForeignKey('entry_id', 'fk_attachments_entry_id');
        $table->addIndex(array('entry_id'));
        $table->save();
    }

}
