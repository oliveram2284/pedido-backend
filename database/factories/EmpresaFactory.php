<?php

namespace Database\Factories;

use App\Models\Empresa;
use App\Models\Rubro;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rubro = Rubro::all()->random(1)->first();

        return [
            'nombre'   => $this->faker->unique()->company(),
            'rubro_id' => $rubro->id,
            'imagen'   => $this->faker->unique()->image(public_path('storage/empresas'), $width = 640, $height = 480,null, false)
        ];
    }
}
