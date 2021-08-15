<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ApiUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_obj_api()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user,'api')->getJson('/api/user');

        $response->assertStatus(200);
    }
    
   public function test_user_not_auth_api()
   {
     $response = $this->getJson('/api/user');
     $response->assertStatus(401);
   }
}
