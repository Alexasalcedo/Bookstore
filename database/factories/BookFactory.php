<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(4),
            'autor' => $this->faker->sentence(3),
        ];
    }
}
