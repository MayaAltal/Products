<?php
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'brand' => $this->faker->word,
            'category' => $this->faker->word,
            // ... أي مجالات أخرى تريد تضمينها في النموذج
        ];
    }
}
