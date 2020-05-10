<?php

namespace BiegalskiLLC\GenericListings\Traits\Database;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

/**
 * Trait UuidTrait
 * @package BiegalskiLLC\GenericListings\Traits\Database
 */
trait UuidTrait
{
    /**
     * @return string
     */
    public function generateUUID()
    {
        return (string) Str::uuid();
    }

    /**
     * @param string $model
     * @param string $column
     * @return string
     */
    public function generateModelUuid(string $model, string $column = 'uuid') : string
    {
        do {
            $uuid = $this->generateUUID();
        } while (
            DB::table($model)->where($column, '=', $uuid)->first() instanceof DB
        );

        return $uuid;
    }
}
