<?php

namespace Plank\Frontdesk\Concerns;

use Illuminate\Database\Eloquent\Builder;
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

    public function buildMenu($id = null, $depth = 3): string
    {
        $q = $this->menus()->with(['hyperlinks' => function (Builder $q) {
            $q->orderBy('order');
        }]);

        if (!empty($id)) {
            $menu = $q->first()->hyperlinks;
        } else {
            $menu = $q->find($id)->hyperlinks;
        }

    }
}