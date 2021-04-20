<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1,100) as $index) {

            DB::table('UserDetail')->insert([
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'phone' => Str::random(10),
            ]);

            $userids = DB::table('UserDetail')->pluck('id');

            DB::table('UserParentDetail')->insert([
                'user_id' => $faker->randomElement($userids),
                'parent_name' => Str::random(10),
                'parent_email' => Str::random(10).'@gmail.com',
                'parent_phone' => Str::random(10),
            ]);

            DB::table('UserResidentialDetail')->insert([
                'user_id' => $faker->randomElement($userids),   
                'city' => Str::random(10),
                'state' => Str::random(10),
                'country' => Str::random(10),
            ]);

            DB::table('UserSchoolDetail')->insert([
                'user_id' => $faker->randomElement($userids),   
                'school_name' => Str::random(10),
                'school_equired' => Str::random(10),
            ]);

        }
        
    }
}
