<?php

use Phinx\Migration\AbstractMigration;

class RenameEntriesColumnValue extends AbstractMigration {

    /**
     * Change Method.
     * Rename `value` column to `entry_value` in `entries` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The renameColumn command can be used in this method and Phinx will
     * automatically reverse it when rolling back
     */
    public function change(){
        $table = $this->table('entries');
        $table->renameColumn('value', 'entry_value');
    }
}