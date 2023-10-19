<?php

namespace Plank\Frontdesk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Menu extends Model
{
    protected $guarded = ['id'];

    public function hyperlinks(): HasMany
    {
        $hyperlinkModel = config('frontdesk.models.hyperlink');
        return $this->hasMany($hyperlinkModel);
    }

}