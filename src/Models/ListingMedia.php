<?php

namespace BiegalskiLLC\GenericListings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ListingMedia
 * @package BiegalskiLLC\GenericListings\Models
 */
class ListingMedia extends Model
{
    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }
}
