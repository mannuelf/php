<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
				'username' =>'MannyF',
				'password' => 'silver09',
				'password_salt' => '0',
				'email' => 'mannuel.ferreira@gmail.com',
				'first_name' => 'Mannuel',
				'last_name' => 'Ferrreira',
				'image' => 'zolor-zj_400x400.jpg',
				'role_id' => 1,
				'active' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				//'deleted_at'       => date('Y-m-d H:i:s'),
			]
		];

		$posts = $this->table('users');
		$posts->insert($data)
			->save();

		$faker = Faker\Factory::create();
		$data = [];
		for ($i = 0; $i < 100; $i++) {
			$data[] = [
				'username'      => $faker->userName,
				'password'      => sha1($faker->password),
				'password_salt' => sha1('foo'),
				'email'         => $faker->email,
				'first_name'    => $faker->firstName,
				'last_name'     => $faker->lastName,
				'image' 		=> $faker->imageUrl(),
				'role_id' 		=> $faker->randomDigit,
				'active' 		=> 0,
				'created_at'    => date('Y-m-d H:i:s'),
				'updated_at'    => date('Y-m-d H:i:s'),
			];
		}

		$this->insert('users', $data);
		//$posts->truncate();
    }
}
