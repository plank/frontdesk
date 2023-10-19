<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface MenuableInterface
{
    public function menus(): MorphToMany;
}