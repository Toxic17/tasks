<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;


class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = DB::table('users')->pluck('id');

        return [
            'title' => fake()->sentence(),
            'user_id'=>fake()->randomElement($user_id),
            'description'=> fake()->paragraph(10),
            'completed'=> fake()->boolean(),
            'created_at'=> fake()->date(),
            'updated_at'=> fake()->date()
        ];
    }
}
