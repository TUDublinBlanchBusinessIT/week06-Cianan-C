<?php

namespace Database\Factories;

use App\Models\Scorder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScorderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Scorder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'orderdate' => $this->faker->date('Y-m-d H:i:s'),
        'deliverystreet' => $this->faker->word,
        'deliverycity' => $this->faker->word,
        'deliverycounty' => $this->faker->word,
        'ordertotal' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
