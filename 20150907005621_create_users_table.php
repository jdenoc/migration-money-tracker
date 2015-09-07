<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Migrate Up
     * Create `users` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('users', array('id'=>false, 'primary_key'=>'id'));
        $table->addColumn('id', 'integer', array('identity'=>true, 'signed'=>false));
        $table->addColumn('email', 'string', array('limit'=>100));
    }

    /**
     * Migrate Down
     * Create `users` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->dropTable('users');
    }
}
