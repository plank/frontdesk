<?php

namespace Plank\Frontdesk\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Plank\Frontdesk\Tests\Models\Page;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
{
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(1, true);
        return [
            'title' => $title,
            'slug' => Str::slug($title)
        ];
    }
}
