<?php

namespace Database\Factories;

use App\Models\Centro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Centro>
 */
class CentroFactory extends Factory
{
   
    protected $model = Centro::class;


    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->email,
            'responsable' => $this->faker->name,
            'web' => $this->faker->unique()->url,
            'logo' => $this->faker->uuid().'.jpg',
        ];
    }
}
