<?php

namespace Plank\Frontdesk\Tests\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Frontdesk\Concerns\IsLinkable;
use Plank\Frontdesk\Contracts\Linkable;
use Plank\Frontdesk\Tests\Database\Factories\ArticleFactory;

class Article extends Model implements Linkable
{
    use IsLinkable;
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory(): ArticleFactory
    {
        return ArticleFactory::new();
    }

    public function linkTitle(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->title,
        );
    }

    public function linkUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => "https://example.com/articles/{$this->id}",
        );
    }
}