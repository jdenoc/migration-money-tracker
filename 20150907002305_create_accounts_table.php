<?php

use Phinx\Migration\AbstractMigration;

class CreateAccountsTable extends AbstractMigration
{

    /**
     * Migrate Up
     * Create `accounts` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('accounts', array('id'=>false, 'primary_key'=>'id'));
        $table->addColumn('id', 'integer', array('signed'=>false, 'identity'=>true));
        $table->addColumn('account', 'string', array('limit'=>100));
        $table->addColumn('total', 'decimal', array('default'=>0.00, 'precision'=>10, 'scale'=>2));
        $table->save();
    }

    /**
     * Migrate Down
     * Drop `accounts` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->dropTable('accounts');
    }
}
