<?php

namespace Plank\Frontdesk\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Plank\Frontdesk\Models\Menu;

trait HasMenus
{
    /**
     * @return MorphToMany
     */
    public function menus(): MorphToMany
    {
        /** @var $this Model */
        return $this->morphToMany(Menu::class, 'menuable')
            ->orderByPivot('order');
    }
}