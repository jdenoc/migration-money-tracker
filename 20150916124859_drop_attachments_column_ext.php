<?php

use Phinx\Migration\AbstractMigration;

class DropAttachmentsColumnExt extends AbstractMigration
{
    /**
     * Migrate UP
     * Drop `ext` column in `Attachments` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('attachments');
        $table->removeColumn('ext');
        $table->update();
    }

    /**
     * Migrate UP
     * Create `ext` column in `Attachments` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $table = $this->table('attachments');
        $table->addColumn('ext', 'string', array('limit'=>10));
        $table->update();
    }
}
