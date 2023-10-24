<?php

namespace Plank\Frontdesk\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;
/**
 * @property-read Collection<Model&LinksToContent> $hyperlinks
 * @property-read string $linkTitle
 * @property-read string $linkUrl
 */
interface LinkableInterface
{
    public function hyperlinks(): MorphMany;
}