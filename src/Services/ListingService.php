<?php

namespace BiegalskiLLC\GenericListings\Services\Listings;

use BiegalskiLLC\GenericListings\Repositories\ListingRepository;
use BiegalskiLLC\GenericListings\Services\BaseService;

/**
 * Class ListingService
 * @package BiegalskiLLC\GenericListings\Services\Listings
 */
class ListingService extends BaseService
{
    /**
     * @var ListingRepository
     */
    private $listing;

    /**
     * ListingService constructor.
     * @param ListingRepository $listingRepository
     */
    public function __construct(ListingRepository $listingRepository)
    {
        $this->listing = $listingRepository;
        parent::__construct($this->listing);
    }
}
