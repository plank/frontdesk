<?php

namespace Plank\Frontdesk\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Frontdesk\Concerns\HasMenus;
use Plank\Frontdesk\Contracts\MenuableInterface;
use Plank\Frontdesk\Tests\Database\Factories\PageFactory;

class Page extends Model implements MenuableInterface
{
    use HasMenus;
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory(): PageFactory
    {
        return PageFactory::new();
    }
}