<?php

namespace Plank\Frontdesk\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Plank\Frontdesk\Models\Hyperlink;

trait IsLinkable
{
    public function hyperlinks(): MorphMany
    {
        return $this->morphMany(Hyperlink::class, 'linkable');
    }
}