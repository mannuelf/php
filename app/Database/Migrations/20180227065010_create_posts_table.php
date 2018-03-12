<?php


use Phinx\Migration\AbstractMigration;

class CreatePostsTable extends AbstractMigration
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
		$table = $this->table('posts');
		$table->addColumn('title', 'string', ['limit' => 255])
			->addColumn('user_id', 'integer')
			->addColumn('image_path', 'string')
			->addColumn('content', 'text', ['limit' => 255])
			->addColumn('tags', 'string', ['limit' => 255, 'null' => true])
			->addColumn('status_id', 'integer', ['default' => 1])
			->addColumn('comment_count', 'integer', ['default' => 0])
			->addColumn('category_id', 'integer')
			->addColumn('views_count', 'boolean', ['default' => true])
			->addIndex(['title'], ['unique' => true])
			//->addForeignKey('user_id', 'users', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
			//->addForeignKey('status_id', 'statuses', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
			//->addForeignKey('category_id', 'categories', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
			->addTimestamps()
			->create();

    }
}
