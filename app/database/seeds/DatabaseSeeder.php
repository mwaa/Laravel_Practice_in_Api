<?php

class DatabaseSeeder extends Seeder {

    private $tables =[
        'lessons',
        'tags',
        'lesson_tag'
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach ($this->tables as $tableName)
        {
            DB::table($tableName)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
