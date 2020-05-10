<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_addresses', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('listing_id')->index();
            $table->string('address_one')->nullable();
            $table->string('address_two', 50)->nullable();
            $table->string('po_box', 10)->nullable();
            $table->string('city', 150)->index()->nullable();
            $table->string('region', 150)->index()->nullable();
            $table->string('postal_code', 16)->nullable();
            $table->string('country', 150)->index()->nullable();
            $table->decimal('latitude', 10, 8)->index()->nullable();
            $table->decimal('longitude', 11, 8)->index()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('listing_id')
                ->references('id')
                ->on('listings')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_addresses');
    }
}
