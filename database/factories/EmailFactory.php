<?php

namespace Database\Factories;

use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmailFactory extends Factory
{
    protected $model = Email::class;

    public function definition(): array
    {
        return [];
    }

    public function any(): self
    {
        return $this->state(fn (array $attributes) => [
            'email' => fake()->email(),
            'content' => fake()->text(),
        ]);
    }
}
