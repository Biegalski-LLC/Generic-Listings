<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateListingCategoryMapTable
 * @desc Many-to-Many Association Table. Suffixed with _map to differentiate from the 'listings_categories' table which houses the categories.
 */
class CreateListingCategoryMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_category_map', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('listing_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->timestamps();

            $table->index(['listing_id', 'category_id']);

            $table->foreign('listing_id')
                ->references('id')
                ->on('listings')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('listing_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_category_map');
    }
}
