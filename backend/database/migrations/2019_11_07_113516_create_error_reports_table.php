<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErrorReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('content');
            $table->timestamp('last_updated');
            $table->bigInteger('id_user')->unsigned()->index();
            $table->bigInteger('id_interest_category')->unsigned()->index();
            $table->foreign('id_user')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('error_reports');
    }
}
