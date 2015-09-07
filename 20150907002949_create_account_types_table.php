<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateAccountTypesTable extends AbstractMigration
{
    /**
     * Migrate Up
     * Create `account_types` tables
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up() {
        $table = $this->table('account_types', array('id'=>false, 'primary_key'=>'id'));
        $table->addColumn('id', 'integer', array('signed'=>false, 'identity'=>true));
        $table->addColumn('type', 'enum', array('values'=>array(
            'checking','savings','credit card','debit card'
        )));
        $table->addColumn('last_digits', 'integer', array('limit'=>4));
        $table->addColumn('type_name', 'string', array('limit'=>21));
        $table->addColumn('account_group', 'integer', array('signed'=>false));
        $table->addColumn('disabled', 'integer', array('limit'=>MysqlAdapter::INT_TINY, 'default'=>0));
        $table->addColumn('last_updated', 'timestamp', array('default'=>'CURRENT_TIMESTAMP', 'update'=>'CURRENT_TIMESTAMP'));
        $table->addIndex(array('disabled'));
        $table->save();
    }

    /**
     * Migrate Down
     * Drop `account_types` tables
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function down(){
        $this->dropTable('account_types');
    }
}
