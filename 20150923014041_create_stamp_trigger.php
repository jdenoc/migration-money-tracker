<?php

use Phinx\Migration\AbstractMigration;

class CreateStampTrigger extends AbstractMigration {

    /**
     * Migrate UP.
     * Create `entry_creation_timestamp` trigger
     * Trigger sets entries.create_stamp timestamp to NOW() on INSERT
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $this->execute(
            "CREATE TRIGGER entry_creation_timestamp
            BEFORE INSERT ON entries
            FOR EACH ROW
            SET NEW.create_stamp = NOW();"
        );
    }

    /**
     * Migrate DOWN
     * Drop `entry_creation_timestamp` trigger
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->execute("DROP TRIGGER IF EXISTS entry_creation_timestamp");
    }
}