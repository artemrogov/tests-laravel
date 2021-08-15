<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use mysql_xdevapi\Exception;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;

class ApiProgramTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_programs_index()
    {
        $userAdmin = User::factory()->create();
        $response = $this->actingAs($userAdmin,'api')->getJson(route('api.programs'));
        $response->assertStatus(200);
    }

    public function test_api_get_data_structure_full()
    {
        $userAdmin = User::factory()->create();
        $response = $this->actingAs($userAdmin,'api')->getJson(route('api.programs'));
        $response->assertJsonStructure([
            [
                 'id_program',
                 'name',
                 'description',
                  'meta'=>[
                     'uuid',
                     'created_at',
                     'updated_at'
                  ]
           ]
        ]);
    }

    public function test_api_get_data_structure_meta()
    {
       $userAdmin = User::factory()->create();
       $response = $this->actingAs($userAdmin,'api')->getJson(route('api.programs'));
       $response->assertJsonStructure([
          [
              'meta'=>[
                  'uuid',
                  'created_at',
                  'updated_at'
              ]
          ]
       ]);
    }

    public function test_api_store_program()
    {
        $userAdmin = User::factory()->create();

        $response = $this->actingAs($userAdmin,'api')->postJson(route('api.programs.store'),[
            'name'=>'program name',
            'active'=>true,
            'description'=>'for testing',
        ]);

        $response->assertStatus(201);
    }

    public function test_api_put_program()
    {
        try {

         $userAdmin = User::factory()->create();

         $program = \App\Models\Program::first();

         if(is_null($program)){
             throw new \Exception("Не данных для теста!");
         }

             $response = $this->actingAs($userAdmin, 'api')
                 ->putJson(route('api.programs.update', $program->id), [
                 'name' => 'program name updated',
                 'active' => true,
                 'description' => 'for testing',
             ]);

             $response->assertStatus(200);

         }catch(\Exception $err){
             return $err->getMessage();
         }
    }


    public function test_api_delete_program()
    {
        try {

            $userAdmin = User::factory()->create();

            $program = \App\Models\Program::first();

            if(is_null($program)){
                throw new \Exception("Не данных для теста!");
            }

            $response = $this->actingAs($userAdmin)->deleteJson(route('api.programs.delete',$program->id));
            $response->assertStatus(200);

        }catch (\Exception $err){
            return $err->getMessage();
        }
    }

}
