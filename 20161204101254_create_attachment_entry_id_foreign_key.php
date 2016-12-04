<?php

use Phinx\Migration\AbstractMigration;

class CreateAttachmentEntryIdForeignKey extends AbstractMigration
{
    /**
     * Change Method.
     * Creates a foreign key on the attachments.entry_id column linking it to the entries.id column
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function change(){
        $this->table('attachments')
            ->addForeignKey('entry_id', 'entries', array('id'), array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
            ->save();
    }

}
