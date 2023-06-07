<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proves', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->string('prove_image');
            $table->longtext('prove_comment');
            $table->date('donated_date');
            $table->integer('status')->deafult(0);
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
        Schema::dropIfExists('proves');
    }
}
