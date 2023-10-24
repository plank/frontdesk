<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface Menuable
{
    public function menus(): MorphToMany;
}