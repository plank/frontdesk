<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface NavigableInterface
{
    public function navigation(): MorphOne;
}