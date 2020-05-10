<?php

namespace BiegalskiLLC\GenericListings\Observers;

use BiegalskiLLC\GenericListings\Models\Listing;
use BiegalskiLLC\GenericListings\Traits\Database\UuidTrait;

/**
 * Class ListingModelObserver
 * @package BiegalskiLLC\GenericListings\Observers
 */
class ListingModelObserver
{
    use UuidTrait;

    /**
     * @param Listing $listing
     */
    public function creating(Listing $listing): void
    {
        $listing->uuid = $this->generateModelUuid('listings');
    }
}
