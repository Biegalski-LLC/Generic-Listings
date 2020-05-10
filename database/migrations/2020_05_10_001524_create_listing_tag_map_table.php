<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateListingTagMapTable
 * @desc Many-to-Many Association Table. Suffixed with _map to differentiate from the 'listings_tags' table which houses the tags.
 */
class CreateListingTagMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_tag_map', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id')->index();
            $table->unsignedBigInteger('tag_id')->index();
            $table->timestamps();

            $table->index(['listing_id', 'tag_id']);

            $table->foreign('listing_id')
                ->references('id')
                ->on('listings')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('listing_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_tag_map');
    }
}
