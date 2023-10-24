<?php

namespace Plank\Frontdesk\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Plank\Frontdesk\Models\Hyperlink;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<Hyperlink> $hyperlinks
 */
trait IsLinkable
{
    public function hyperlinks(): MorphMany
    {
        return $this->morphMany(Hyperlink::class, 'linkable');
    }
}