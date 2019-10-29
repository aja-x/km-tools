<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('duration');
            $table->bigInteger('id_article')->unsigned()->index();
            $table->bigInteger('id_test_category')->unsigned()->index();
            $table->unique(['id_article', 'id_test_category']);
            $table->foreign('id_article')->references('id')
                ->on('articles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_test_category')->references('id')
                ->on('test_categories')->onUpdate('cascade')->onDelete('no action');
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
        Schema::dropIfExists('tests');
    }
}
