<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTestLearn extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_auth_user()
    {
      $user = User::factory()->create();
      $response = $this->actingAs($user)->get('/login-test');
      $response->assertStatus(200);
    }
}
