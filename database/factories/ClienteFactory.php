<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = (rand(0,1) == 1)? 'male':'female';
        return [
            'nombre'    => $this->faker->unique()->firstName($gender).' '.$this->faker->unique()->lastname(),
            'domicilio' => $this->faker->unique()->address(),
            'telefono'  => $this->faker->unique()->phoneNumber(),
            'celular'   => $this->faker->unique()->phoneNumber(),
            'estado'    => 1,
        ];
    }
}
