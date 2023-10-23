<?php

use Plank\Frontdesk\Models\Menu;
use Plank\Frontdesk\Tests\Models\Article;
use Plank\Frontdesk\Tests\Models\Page;

it('can fetch hyperlinks via its relationship', function () {
    $menu = Menu::create([
        'identifier' => 'test'
    ]);

    $article1 = Article::factory()->create();
    $article2 = Article::factory()->create();

    $link1 = $article1->hyperlinks()->create([
        'title' => $article1->title,
        'destination' => "https://example.com/{$article1->id}",
        'menu_id' => $menu->id
    ]);

    $link2 = $article2->hyperlinks()->create([
        'title' => $article2->title,
        'destination' => "https://example.com/{$article2->id}",
        'menu_id' => $menu->id
    ]);

    expect($menu->hyperlinks->count())->toBe(2);

    expect($menu->hyperlinks[0]->title)->toBe($link1->title);
    expect($menu->hyperlinks[0]->destination)->toBe($link1->destination);

    expect($menu->hyperlinks[1]->title)->toBe($link2->title);
    expect($menu->hyperlinks[1]->destination)->toBe($link2->destination);

});
