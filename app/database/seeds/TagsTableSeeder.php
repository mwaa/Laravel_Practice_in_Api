<?php

// Composer: "fzaninotto/faker": "v1.3.0"


class TagsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Tag::create([
                'name' => $faker->word
			]);
		}
	}

}