<?php

use Phinx\Migration\AbstractMigration;

class AddUniqueAttachmentsColumnUid extends AbstractMigration {

    /**
     * Change Method.
     * Adds a unique uid column to the attachments table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function change(){
        $table = $this->table('attachments');
        $table->addColumn('uid', 'string', array('after'=>'attachment', 'limit'=>50, 'null' => true));
        $table->addIndex('uid', array('unique'=>true));
        $table->update();
    }

}