<?php

use Plank\Frontdesk\Models\Hyperlink;
use Plank\Frontdesk\Models\Menu;

it('can be nested under other hyperlinks', function () {
    $parent = Hyperlink::factory()->create();
    $child = Hyperlink::factory()->create([
        'parent_id' => $parent->id
    ]);

    expect($child->parent->id)->toBe($parent->id);
});

it('can reach parent hyperlinks via its relationship', function () {
    $parent = Hyperlink::factory()->create();
    $child = Hyperlink::factory()->create([
        'parent_id' => $parent->id
    ]);

    expect($child->parent->id)->toBe($parent->id);
});

it('can get the menu it is attached to', function () {
    $menu = Menu::factory()->create();
    $hyperlink = Hyperlink::factory()->create([
        'menu_id' => $menu->id
    ]);

    expect($hyperlink->menu->count())->toBe(1);
});