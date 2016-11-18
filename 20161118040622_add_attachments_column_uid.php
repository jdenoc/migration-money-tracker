<?php

use Phinx\Migration\AbstractMigration;

class AddAttachmentsColumnUid extends AbstractMigration
{
    /**
     * Change Method.
     * Adds a uid column to the attachments table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function change(){
        $table = $this->table('attachments');
        $table->addColumn('uid', 'string', array('after'=>'attachment', 'limit'=>50));
        $table->update();
    }
}