<?php

namespace BiegalskiLLC\GenericListings;

use BiegalskiLLC\GenericListings\Models\Listing;
use BiegalskiLLC\GenericListings\Models\ListingAddress;
use BiegalskiLLC\GenericListings\Models\ListingCategory;
use BiegalskiLLC\GenericListings\Models\ListingContact;
use BiegalskiLLC\GenericListings\Models\ListingInventory;
use BiegalskiLLC\GenericListings\Observers\ListingAddressModelObserver;
use BiegalskiLLC\GenericListings\Observers\ListingCategoryModelObserver;
use BiegalskiLLC\GenericListings\Observers\ListingContactModelObserver;
use BiegalskiLLC\GenericListings\Observers\ListingInventoryModelObserver;
use BiegalskiLLC\GenericListings\Observers\ListingModelObserver;
use BiegalskiLLC\GenericListings\Services\Listings\ListingService;
use Illuminate\Support\ServiceProvider;

class GenericListingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ListingService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Publish configuration file
         */
        $this->publishes([
            __DIR__ . '/../config/generic-listings.php' => config_path('generic-listings.php')
        ], 'generic_listings_config');

        /**
         * Load migrations
         */
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        /**
         * Load Observers
         */
        Listing::observe(ListingModelObserver::class);
        $this->listingAddress();
        $this->listingCategory();
        $this->listingContact();
        $this->listingInventory();
    }

    /**
     * @desc Listing Address Observer
     */
    private function listingAddress(): void
    {
        if( config('generic-listings.features.enable_address') === true ){
            ListingAddress::observe(ListingAddressModelObserver::class);
        }
    }

    /**
     * @desc Listing Category Observer
     */
    private function listingCategory(): void
    {
        if( config('generic-listings.features.enable_categories') === true ){
            ListingCategory::observe(ListingCategoryModelObserver::class);
        }
    }

    /**
     * @desc Listing Contact Observer
     */
    private function listingContact(): void
    {
        if( config('generic-listings.features.enable_contact') === true ){
            ListingContact::observe(ListingContactModelObserver::class);
        }
    }

    /**
     * @desc Listing Contact Observer
     */
    private function listingInventory(): void
    {
        if( config('generic-listings.features.enable_inventory') === true ){
            ListingInventory::observe(ListingInventoryModelObserver::class);
        }
    }
}
