<?php

namespace BiegalskiLLC\GenericListings\Observers;

use BiegalskiLLC\GenericListings\Models\ListingInventory;
use BiegalskiLLC\GenericListings\Traits\Database\UuidTrait;

/**
 * Class ListingInventoryModelObserver
 * @package BiegalskiLLC\GenericListings\Observers
 */
class ListingInventoryModelObserver
{
    use UuidTrait;

    /**
     * @param ListingInventory $listingInventory
     */
    public function creating(ListingInventory $listingInventory)
    {
        $listingInventory->uuid = $this->generateModelUuid('listing_inventories');
    }
}
