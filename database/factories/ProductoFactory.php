<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'          => $this->faker->unique()->words(4,true),
            'cantidad'        => $this->faker->unique()->randomNumber(2),
            'precio_unitario' => $this->faker->unique()->randomFloat(2,$min = 0, $max = 1000),
            'estado'          => 1,
        ];
    }
}
