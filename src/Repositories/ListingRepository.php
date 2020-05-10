<?php

namespace BiegalskiLLC\GenericListings\Repositories;

use BiegalskiLLC\GenericListings\Models\Listing;

/**
 * Class ListingRepository
 * @package BiegalskiLLC\GenericListings\Repositories
 */
class ListingRepository extends BaseRepository
{
    /**
     * @var Listing
     */
    private $listing;

    /**
     * ListingRepository constructor.
     * @param Listing $listing
     */
    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
        parent::__construct($this->listing);
    }
}
