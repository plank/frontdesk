<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


/**
 * @property-read Collection<Model&AggregatesLinks> $menus
 * Could add $navs to this interface if you decide to implement it
 */
interface Menuable
{
    public function menus(): MorphToMany;
}