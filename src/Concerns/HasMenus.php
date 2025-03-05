<?php

namespace Plank\Frontdesk\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Plank\Frontdesk\Models\Menu;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 *
 * @property-read Collection<Menu> $menus
 */
trait HasMenus
{
    public function menus(): MorphToMany
    {
        return $this->morphToMany(Menu::class, 'menuable')
            ->orderByPivot('order');
    }
}
