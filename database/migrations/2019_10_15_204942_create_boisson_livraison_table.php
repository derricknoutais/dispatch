<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoissonLivraisonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boisson_livraison', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('boisson_id');
            $table->unsignedBigInteger('livraison_id');
            $table->unsignedInteger('quantité');
            $table->unsignedInteger('quantité_livrée')->nullable();
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
        Schema::dropIfExists('boisson_livraison');
    }
}
