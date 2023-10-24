<?php

use Plank\Frontdesk\Models\Hyperlink;
use Plank\Frontdesk\Models\Menu;
use Plank\Frontdesk\Tests\Database\Factories\HyperlinkFactory;
use Plank\Frontdesk\Tests\Database\Factories\MenuFactory;

return [
    'models' => [
        'hyperlink' => Hyperlink::class,
        'menu' => Menu::class
    ],
    'factories' => [
        'hyperlink' => HyperlinkFactory::class,
        'menu' => MenuFactory::class
    ]
];