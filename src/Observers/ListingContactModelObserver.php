<?php

namespace BiegalskiLLC\GenericListings\Observers;

use BiegalskiLLC\GenericListings\Models\ListingContact;
use BiegalskiLLC\GenericListings\Traits\Database\UuidTrait;

/**
 * Class ListingContactModelObserver
 * @package BiegalskiLLC\GenericListings\Observers
 */
class ListingContactModelObserver
{
    use UuidTrait;

    /**
     * @param ListingContact $listingContact
     */
    public function creating(ListingContact $listingContact)
    {
        $listingContact->uuid = $this->generateModelUuid('listing_contacts');
    }
}
