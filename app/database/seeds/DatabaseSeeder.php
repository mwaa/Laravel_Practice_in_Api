<?php

class DatabaseSeeder extends Seeder {

    private $tables =[
        'lessons',
        'tags'
    ];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->cleanDatabase();
        Eloquent::unguard();
		$this->call('LessonsTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('LessonTagTableSeeder');
	}

    private  function cleanDatabase()
    {

    }
}
