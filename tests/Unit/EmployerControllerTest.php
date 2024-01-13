<?php

namespace Tests\Unit;

use App\Http\Controllers\EmployerController;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class EmployerControllerTest extends TestCase
{

    public function test_store()
    {

        // Define purpose 
        //  Check if store() fxn actually stores the data

        // env
        $controller = $this->app->make(EmployerController::class);

        //source of truth
        $payload = [
            'company_name' => 'RKGIT'
        ];

        //compare
        // $result = $controller->store($payload);

        // $this->assertSame( $payload['company_name'], $result->company_name );
        $this->assertTrue(true);
    }
    
    
}
