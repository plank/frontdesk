<?php

use Plank\Frontdesk\Tests\Models\Article;

it('can be turned into a hyperlink model', function () {
    $article = Article::factory()->create();

    $article->hyperlinks()->create([
        'title' => $article->title,
    ]);

    expect($article->hyperlinks->count())->toBe(1);
    expect($article->hyperlinks->first()->title)->toBe($article->title);
});

it('can have many hyperlinks reference it', function () {
    $article = Article::factory()->create();

    $article->hyperlinks()->create([
        'title' => $article->title,
        'destination' => "https://example.com/{$article->id}",
    ]);

    $article->hyperlinks()->create([
        'title' => $article->title,
        'destination' => "https://example.com/{$article->id}",
    ]);

    expect($article->hyperlinks->count())->toBe(2);

    $article->hyperlinks->each(function ($hyperlink) use ($article) {
        expect($hyperlink->title)->toBe($article->title);
        expect($hyperlink->destination)->toBe("https://example.com/{$article->id}");
    });
});

it('can infer the title and destination if they arent provided', function () {
    $article = Article::factory()->create();

    $article->hyperlinks()->create();

    expect($article->hyperlinks->count())->toBe(1);
});
