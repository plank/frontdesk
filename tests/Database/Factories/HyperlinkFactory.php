<?php

namespace Plank\Frontdesk\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Plank\Frontdesk\Models\Hyperlink;
use Plank\Frontdesk\Tests\Models\Page;

class HyperlinkFactory extends Factory
{
    protected $model = Hyperlink::class;

    public function definition()
    {
        return [
            'destination' => $this->faker->url,
            'title' => $this->faker->sentence,
            'linkable_type' => 'Plank\Frontdesk\Models\Page',
            'linkable_id' => Page::factory(),
        ];
    }
}
