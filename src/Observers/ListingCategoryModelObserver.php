<?php

namespace BiegalskiLLC\GenericListings\Observers;

use BiegalskiLLC\GenericListings\Models\ListingCategory;
use BiegalskiLLC\GenericListings\Traits\Database\UuidTrait;

/**
 * Class ListingCategoryModelObserver
 * @package BiegalskiLLC\GenericListings\Observers
 */
class ListingCategoryModelObserver
{
    use UuidTrait;

    /**
     * @param ListingCategory $listingCategory
     */
    public function creating(ListingCategory $listingCategory)
    {
        $listingCategory->uuid = $this->generateModelUuid('listing_categories');
    }
}
