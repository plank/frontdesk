<?php

namespace Plank\Frontdesk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Navigation extends Model
{
    protected $fillable = [
        'destination',
        'navigable_id',
        'navigable_type',
    ];

    public function navigable(): MorphTo
    {
        return $this->morphTo();
    }
}