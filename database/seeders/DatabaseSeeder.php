<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {  
        \App\Models\User::factory(100)->create()->each(function($user){
            \App\Models\UserDomicilio::factory()->times(rand(1,3))->create([
                'user_id'=>$user->id
            ]);    
        });

        /*
        \App\Models\User::factory(10)->has(
            \App\Models\UserDomicilio::factory()->times(rand(1, 8))
        )->create();*/

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
