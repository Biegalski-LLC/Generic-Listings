<?php

namespace BiegalskiLLC\GenericListings\Observers;

use BiegalskiLLC\GenericListings\Models\ListingAddress;
use BiegalskiLLC\GenericListings\Traits\Database\UuidTrait;

/**
 * Class ListingAddressModelObserver
 * @package BiegalskiLLC\GenericListings\Observers
 */
class ListingAddressModelObserver
{
    use UuidTrait;

    /**
     * @param ListingAddress $listingAddress
     */
    public function creating(ListingAddress $listingAddress): void
    {
        $listingAddress->uuid = $this->generateModelUuid('listing_addresses');
    }
}
