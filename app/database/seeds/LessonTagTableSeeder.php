<?php
/**
 * Created by PhpStorm.
 * User: Mwaa
 * Date: 1/24/2015
 * Time: 3:18 PM
 */
use Faker\Factory as Faker;

class LessonTagTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $lessonsIds = Lesson::lists('id');
        $tagIds = Tag::lists('id');


        foreach(range(1, 30) as $index)
        {
           DB::table('lesson_tag')->insert([
               'lesson_id' => $faker->randomElement($lessonsIds),
               'tag_id' => $faker->randomElement($tagIds)
           ]);
        }
    }
} 