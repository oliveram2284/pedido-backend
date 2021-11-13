<?php

namespace Database\Factories;

use App\Models\Empresa;
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
        $empresa = Empresa::all()->random(1)->first();
        //dd($empresa->id);
        return [
            'empresa_id'      => $empresa->id,
            'nombre'          => $this->faker->unique()->words(4,true),
            'imagen'          => null,//$this->faker->unique()->image(public_path('images/productos'), $width = 400, $height = 200,null, false),
            'cantidad'        => $this->faker->unique()->randomNumber(2),
            'precio_unitario' => $this->faker->unique()->randomFloat(2,$min = 0, $max = 1000),
            'estado'          => 1,
        ];
    }
}
