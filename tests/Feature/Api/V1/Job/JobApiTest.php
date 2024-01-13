<?php

namespace Tests\Feature\Api\V1\Job;

use App\Models\Job;
use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        // Load from database
        User::factory()->create([
            'email' => 'dogesh@cheem.com',
            'password' => 'huehuehue'
        ]);
        
        User::factory(10)->create();

        $users = User::all()->shuffle();

        for ( $i=1; $i <= 5; $i++ ) { 
            
            Employer::factory()->create([
                'user_id' => $users->last()->id
            ]);

            $users->pop();
        }

        $employers = Employer::all();

        for ($i=1; $i <= 5; $i++) { 
            
            Job::factory()->create([
                'employer_id' => $employers->random(1)->first()->id
            ]);
        }

        foreach ($users as $user) {

            $jobs = Job::inRandomOrder()->take(rand(0,4))->get();

            foreach ($jobs as $job ) {

                JobApplication::factory()->create([
                    'job_id' => $job->id,
                    'user_id' => $user->id
                ]);
            }
        }

        //go to uri
        $response = $this->json('get', '/jobs' );
        
        // assert Status
        // dump($response);
        $response->assertStatus(200);

    }


}



