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
        DB::statement('ALTER TABLE lesson_tag DISABLE TRIGGER ALL');
        foreach ($this->tables as $tableName)
        {
            DB::table($tableName)->truncate();
        }
        DB::statement('ALTER TABLE lesson_tag ENABLE TRIGGER ALL');

    }
}
