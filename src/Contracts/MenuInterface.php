<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface MenuInterface
{
    public function hyperlinks(): HasMany;
}