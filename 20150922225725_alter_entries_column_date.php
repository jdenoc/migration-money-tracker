<?php

use Phinx\Migration\AbstractMigration;

class AlterEntriesColumnDate extends AbstractMigration {

    /**
     * Migrate UP
     * Rename `date` column to `entry_date` in `entries` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('entries');
        $table->removeIndex(array('date'));
        $table->renameColumn('date', 'entry_date');
        $table->addIndex(array('entry_date'));
        $table->save();
    }

    /**
     * Migrate DOWN
     * Rename `entry_date` column to `date` in `entries` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $table = $this->table('entries');
        $table->removeIndex(array('entry_date'));
        $table->renameColumn('entry_date', 'date');
        $table->addIndex(array('date'));
        $table->save();
    }
}
