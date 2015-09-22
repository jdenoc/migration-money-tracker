<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateEntriesTable extends AbstractMigration
{
    /**
     * Migrate Up
     * Create `entries` table
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function up(){
        $table = $this->table('entries', array('id'=>false, 'primary_key'=>'id'));
        $table->addColumn('id', 'integer', array('signed'=>false, 'identity'=>true));
        $table->addColumn('date', 'date');
        $table->addColumn('account_type', 'integer', array('signed'=>false));
        $table->addColumn('value', 'decimal', array('precision'=>10, 'scale'=>2));
        $table->addColumn('memo', 'text');
        $table->addColumn('expense', 'integer', array('limit'=>MysqlAdapter::INT_TINY, 'default'=>1));
        $table->addColumn('confirm', 'integer',
            array('limit'=>MysqlAdapter::INT_TINY, 'default'=>0, 'comment'=>'confirmed according to statements')
        );
        $table->addColumn('deleted', 'integer', array('limit'=>MysqlAdapter::INT_TINY, 'default'=>0));
        $table->addColumn('stamp', 'timestamp', array('default'=>'CURRENT_TIMESTAMP'));
        $table->addIndex(array('entry_date'));
        $table->save();
    }

    public function down(){
        $this->dropTable('entries');
    }
}