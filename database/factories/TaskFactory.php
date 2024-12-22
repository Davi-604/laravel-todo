<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $category = Category::all()->random();

        return [
            'is_done' => $this->faker->boolean(),
            'title' => $this->faker->text(10),
            'description' => $this->faker->text(20),
            'due_date' => $this->faker->dateTime(),
            'user_id' => $category->user,
            'category_id' => $category,
        ];
    }
}
