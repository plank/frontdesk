<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
/**
 * @property-read Collection<Model&LinksToContent> $hyperlinks
 * @property-read string $linkTitle
 * @property-read string $linkUrl
 */
interface LinkableInterface
{
    public function hyperlinks(): MorphMany;
    public function linkTitle(): Attribute;
    public function linkUrl(): Attribute;
}