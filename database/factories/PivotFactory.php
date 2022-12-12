<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PivotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_society' => $this->faker->numberBetween(1, 5),
            'id_project' => $this->faker->numberBetween(1, 5),
            'id_task' => $this->faker->numberBetween(1, 10),
            'id_employee' => $this->faker->numberBetween(1, 15)
        ];
    }
}
