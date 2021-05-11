<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100,100000),
            'description' => $this->faker->text(500),
            'image' => $this->faker->imageUrl($this->faker->numberBetween(300,1000),$this->faker->numberBetween(300,1000),'cat'),
        ];
    }
}
