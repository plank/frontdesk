<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Plank\Frontdesk\Models\Menu;

/**
 * @property int|string $id
 * @property int|string $parent_id
 * @property-read Collection<Linkable> $linkable
 * @property-read Collection<Menu> $menu
 * @property-read Model&LinksToContent|null $parent
 * @property-read Collection<Model&LinksToContent> $children
 */
interface LinksToContent
{
    public function linkable(): MorphTo;

    public function menu(): BelongsTo;

    public function parent(): BelongsTo;

    public function children(): HasMany;
}