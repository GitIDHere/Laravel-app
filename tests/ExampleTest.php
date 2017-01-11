<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    //use WithoutMiddleware;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testMyAccountPageVisit()
    {
        $this->visit('/my-account')
             ->see('Laravel');
    }
}
