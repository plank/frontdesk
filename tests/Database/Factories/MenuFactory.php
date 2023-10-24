<?php

namespace Plank\Frontdesk\Tests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Plank\Frontdesk\Models\Menu;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        return [
            'identifier' => $this->faker->word(),
        ];
    }

}