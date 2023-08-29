<?php

namespace Plank\Frontdesk\Facades;

use Illuminate\Support\Facades\Facade;

class Frontdesk extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'frontdesk';
    }
}
