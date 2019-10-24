<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('score');
            $table->timestamp('completed_time');
            $table->integer('id_user')->index();
            $table->integer('id_test')->index();
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
        Schema::dropIfExists('test_histories');
    }
}
