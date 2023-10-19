<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface LinkableInterface
{
    public function hyperlinks(): MorphMany;
}