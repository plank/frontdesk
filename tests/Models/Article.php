<?php

namespace Plank\Frontdesk\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Frontdesk\Concerns\IsLinkable;
use Plank\Frontdesk\Contracts\LinkableInterface;
use Plank\Frontdesk\Tests\Database\Factories\ArticleFactory;

class Article extends Model implements LinkableInterface
{
    use IsLinkable;
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory(): ArticleFactory
    {
        return ArticleFactory::new();
    }
}