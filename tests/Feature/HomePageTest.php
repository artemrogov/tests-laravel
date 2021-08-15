<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_page_home()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_page_contact()
    {
      $response = $this->get('/contacts');

      $response->assertStatus(200); 
    }

    public function test_page_test2()
    {
     $response = $this->get('/test3');
     $response->assertStatus(200);
    }

    public function test_not_auth_login(){
      $response = $this->get('/login-test');
      $response->assertStatus(401);
    }
}
