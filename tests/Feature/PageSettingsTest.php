<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageSettingsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_page_view_settings()
    {
        $response = $this->get('/settings');

        $response->assertStatus(200);
    }

    public function test_page_view_see_text()
    {
       $response = $this->get('/settings');
       $response->assertSeeText('Test Page Header');
    }

    public function test_page_view_see()
    {
      $response = $this->get('/settings');
      $response->assertSee('Test Page Header');
    }
}
