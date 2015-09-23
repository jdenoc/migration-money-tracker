<?php

use Phinx\Migration\AbstractMigration;

class RenameEntriesColumnStamp extends AbstractMigration {

    /**
     * Change UP.
     * Rename `stamp` column to `create_stamp` in `entries` table
     * Set the default value of `create_stamp` column to NULL
     * Add `modified_stamp` to `entries` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('entries');
        $table->renameColumn('stamp', 'create_stamp');
        $table->changeColumn('create_stamp', 'timestamp', array('null'=>true));
        $table->addColumn('modified_stamp', 'timestamp',
            array('default'=>'CURRENT_TIMESTAMP', 'update'=>'CURRENT_TIMESTAMP')
        );
        $table->update();
    }

    /**
     * Migrate DOWN
     * Rename `create_stamp` column to `stamp` in `entries` table
     * Set the default value of `stamp` column to CURRENT_TIMESTAMP
     * Drop `modified_stamp` column from `entries` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $table = $this->table('entries');
        $table->removeColumn('modified_stamp');
        $table->renameColumn('create_stamp', 'stamp');
        $table->changeColumn('stamp', 'timestamp', array('default'=>'CURRENT_TIMESTAMP'));
        $table->update();
    }
}