<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoissonCommandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boisson_commande', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('boisson_id');
            $table->unsignedBigInteger('commande_id');
            $table->unsignedInteger('quantité');
            $table->unsignedInteger('quantité_reçue')->nullable();
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
        Schema::dropIfExists('boisson_commande');
    }
}
