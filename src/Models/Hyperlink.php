<?php

namespace Plank\Frontdesk\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Plank\Frontdesk\Contracts\HyperlinkInterface;

class Hyperlink extends Model implements HyperlinkInterface
{
    use HasFactory;

    protected $guarded = ['id'];

    public function linkable(): MorphTo
    {
        return $this->morphTo();
    }

    public function menu(): BelongsTo
    {
        $menuClass = config('frontdesk.models.menu');
        return $this->belongsTo($menuClass);
    }

    public function parent(): BelongsTo
    {
        $hyperlinkModel = config('frontdesk.models.hyperlink');
        return $this->belongsTo($hyperlinkModel);
    }

    public function children(): HasMany
    {
        $hyperlinkModel = config('frontdesk.models.hyperlink');
        return $this->hasMany($hyperlinkModel, 'parent_id');
    }

    protected static function newFactory()
    {
        $factory = config('frontdesk.factories.hyperlink');
        return $factory::new();
    }
}