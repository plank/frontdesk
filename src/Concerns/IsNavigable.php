<?php

namespace Plank\Frontdesk\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Plank\Frontdesk\Models\Navigation;

trait IsNavigable
{
    public function navigation(): MorphOne
    {
        return $this->morphOne(Navigation::class, 'navigable');
    }
}