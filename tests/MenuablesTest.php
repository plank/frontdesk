<?php

use Plank\Frontdesk\Models\Hyperlink;
use Plank\Frontdesk\Models\Menu;
use Plank\Frontdesk\Tests\Models\Page;

it('can attach a menu to the page model with hyperlinks attached', function () {
    $page = Page::factory()->create();

    $menu = Menu::create(['identifier' => 'test']);

    $page->menus()->attach($menu, ['order' => 1]);

    $hyperlink = Hyperlink::create([
        'menu_id' => $menu->id,
        'linkable_type' => Page::class,
        'linkable_id' => $page->id,
        'destination' => 'https://plankdesign.com',
        'title' => 'Plank Design',
    ]);

    expect($page->menus->first()->identifier)->toBe('test');
    expect($page->menus->first()->hyperlinks->first()->title)->toBe('Plank Design');
});
