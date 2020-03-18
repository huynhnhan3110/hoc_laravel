<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(articleTableSeeder::class);
        $faker = Faker\Factory::create();
        for($i = 0; $i <100; $i++) {
            Article::create([
                'title' => $faker->text,
                'content' => $faker->text
            ]);
        }
    }
}
