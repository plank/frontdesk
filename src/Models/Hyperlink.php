<?php

namespace Plank\Frontdesk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Hyperlink extends Model
{
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

    /**
     * @return string
     */
    public function render(): string
    {
        return "<a href='{$this->destination}'>{$this->title}</a>";
    }
}