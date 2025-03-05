<?php

namespace Plank\Frontdesk\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Plank\Frontdesk\Tests\Models\Article;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(1, true),
            'body' => fake()->text(100),
        ];
    }
}
