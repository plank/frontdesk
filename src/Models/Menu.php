<?php

namespace Plank\Frontdesk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Plank\Frontdesk\Contracts\HyperlinkInterface;
use Plank\Frontdesk\Contracts\MenuInterface;

class Menu extends Model implements MenuInterface
{
    protected $guarded = ['id'];

    public function hyperlinks(): HasMany
    {
        $hyperlinkModel = config('frontdesk.models.hyperlink');
        return $this->hasMany($hyperlinkModel);
    }

    public function build($depth = 3): Collection
    {
        $links = $this->hyperlinks;

        // order links so that the array is index so that a parent appears and is proceeded by its children, simply using ->sortBy('parent_id') does not produce desired results
        $links = $links->sortBy(function (HyperlinkInterface $link) {
            // sort so that we get parent, child, child, child, new parent, child, child
            return $link->parent_id . $link->id;
        });

        return $links;
    }
}