<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read Collection<Model&LinksToContent> $hyperlinks
 * Could add $navs to this interface if you decide to implement it
 */
interface AggregatesLinks
{
    public function hyperlinks(): HasMany;
}
