<?php


use Phinx\Seed\AbstractSeed;

class PostSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
		$data = [
			[
				'title' =>'MannyF',
				'user_id' => 1,
				'image_path' => 'zolor-zj_400x400.jpg',
				'content' => 'This is a whole lot of content',
				'tags' => 'Mannuel, Samuel, PHP, CSS, JS',
				'status_id' => 1,
				'comment_count' => 1,
				'category_id' => 1,
				'views_count' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			]
		];

		$posts = $this->table('posts');
		$posts->insert($data)
			->save();

		$posts->truncate();
    }
}
