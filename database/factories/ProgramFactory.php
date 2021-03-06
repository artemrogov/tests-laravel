<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProgramFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Program::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_program'=>$this->faker->name(),
            'program_uid'=>(string)Str::uuid(),
            'active'=>(bool)random_int(0,1),
            'description'=>$this->faker->text()
        ];
    }
}
