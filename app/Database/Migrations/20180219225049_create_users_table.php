<?php


use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
		$table = $this->table('users');
		$table->addColumn('username', 'string', ['limit' => 255])
			->addColumn('password', 'string', ['limit' => 255])
			->addColumn('password_salt', 'string')
			->addColumn('email', 'string', ['limit' => 255])
			->addColumn('first_name', 'string', ['limit' => 255, 'null' => true])
			->addColumn('last_name', 'string', ['limit' => 255, 'null' => true])
			->addColumn('image', 'string', ['limit' => 255, 'null' => true])
			->addColumn('role_id', 'integer')
			->addColumn('active', 'boolean', ['default' => true])
			->addIndex(['username', 'email'], ['unique' => true])
			->addForeignKey('role_id', 'roles', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
			->addTimestamps()
			->create();
    }
}
