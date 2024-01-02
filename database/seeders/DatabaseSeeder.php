<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();

        $users = User::all()->shuffle();

        for ( $i=1; $i <= 20; $i++ ) { 
            
            Employer::factory()->create([
                'user_id' => $users->last()->id
            ]);

            $users->pop();
        }

        $employers = Employer::all();

        for ($i=1; $i <= 100; $i++) { 
            
            Job::factory()->create([
                'employer_id' => $employers->random(1)->first()->id
            ]);
        }
    }
}
