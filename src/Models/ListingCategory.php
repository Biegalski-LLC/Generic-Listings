<?php

namespace BiegalskiLLC\GenericListings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ListingCategory
 * @package BiegalskiLLC\GenericListings\Models
 */
class ListingCategory extends Model
{
    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function listings(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Listing::class, 'listing_category_map', 'category_id', 'listing_id');
    }
}
