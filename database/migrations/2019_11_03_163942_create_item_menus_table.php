<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_item_menu');
            $table->string('description_item_menu');
            $table->unsignedBigInteger('id_menu');
            $table->foreign('id_menu')->references('id')->on('menus');
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
        Schema::dropIfExists('item_menus');
    }
}
