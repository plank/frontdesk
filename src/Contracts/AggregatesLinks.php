<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface AggregatesLinks
{
    public function hyperlinks(): HasMany;
}