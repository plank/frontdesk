<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int|string $id
 * @property int|string $parent_id
 * @property-read Collection<Linkable> $linkable
 * @property-read Collection<Menu> $menu
 * @property-read Model&HyperlinkInterface|null $parent
 * @property-read Collection<Model&HyperlinkInterface> $children
 */
interface HyperlinkInterface
{
    public function linkable(): MorphTo;

    public function menu(): BelongsTo;

    public function parent(): BelongsTo;

    public function children(): HasMany;
}