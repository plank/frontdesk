<?php

namespace Plank\Frontdesk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Plank\Frontdesk\Contracts\MenuInterface;

class Menu extends Model implements MenuInterface
{
    protected $guarded = ['id'];

    public function hyperlinks(): HasMany
    {
        $hyperlinkModel = config('frontdesk.models.hyperlink');
        return $this->hasMany($hyperlinkModel);
    }
}