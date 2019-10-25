<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserKmAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_km_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user')->unique();
            $table->bigInteger('id_interest_category')->unsigned()->index();
            $table->foreign('id_interest_category')->references('id')
                ->on('interest_categories')->onUpdate('cascade')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_km_attributes');
    }
}
