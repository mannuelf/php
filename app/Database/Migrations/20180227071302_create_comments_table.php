<?php


use Phinx\Migration\AbstractMigration;

class CreateCommentsTable extends AbstractMigration
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
		$table = $this->table('comments');
		$table->addColumn('post_id', 'string', ['limit' => 255])
			->addColumn('user_id', 'string', ['limit' => 255])
			->addColumn('content', 'text')
			->addColumn('approved', 'boolean', ['default' => false])
			->addColumn('active', 'boolean', ['default' => true])
			//->addForeignKey('post_id', 'posts', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
			//->addForeignKey('user_id', 'users', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
			->addTimestamps()
			->create();
    }
}
