<?php

namespace Plank\Frontdesk\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Plank\Frontdesk\Contracts\AggregatesLinks;

class Menu extends Model implements AggregatesLinks
{
    use HasFactory;

    protected $guarded = ['id'];

    public function hyperlinks(): HasMany
    {
        $hyperlinkModel = config('frontdesk.models.hyperlink');
        return $this->hasMany($hyperlinkModel);
    }

    protected static function newFactory()
    {
        $factory = config('frontdesk.factories.menu');
        return $factory::new();
    }
}