<?php

namespace Plank\Frontdesk\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Plank\Frontdesk\Contracts\LinksToContent;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<LinksToContent> $hyperlinks
 */
trait IsLinkable
{
    public function hyperlinks(): MorphMany
    {
        return $this->morphMany(config('frontdesk.models.hyperlink'), 'linkable');
    }
}
