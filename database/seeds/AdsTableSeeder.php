<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function randomCity()
        {
            $cities = array('Toulon', 'New York', 'Rome', 'Singapour');
            $key = array_rand($cities);
            return $cities[$key];
        }

        function randomAuthor()
        {
            $users = array(1, 2, 3, 4, 5);
            $key = array_rand($users);
            return $users[$key];
        }

        for ($i=0; $i < 30; $i++) {
            DB::table('ads')->insert([
                'title' => 'Annonce n°'. $i,
                'description' => 'Lorem ipsum dolor ' . $i . ' sit amet consectetur adipisicing elit. Enim et quod deserunt incidunt adipisci nulla ratione reiciendis voluptatem. Qui officia eius sed tempora laudantium sequi placeat ipsa id nam ex, eaque corporis beatae eum laboriosam iure aliquid officiis dolor similique provident ea eveniet! Reiciendis, blanditiis assumenda nam quaerat excepturi labore.',
                'localisation' => randomCity(),
                'price' => rand(1500,30000),
                'user_id' => randomAuthor(),
                'created_at' => Carbon\Carbon::now(),
            ]);
        }
    }
}
