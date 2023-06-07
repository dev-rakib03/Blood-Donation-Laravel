<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myrequests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('donor_id')->nullable();
            $table->integer('bank_id')->nullable();
            $table->string('blood_group');
            $table->date('needed_date');
            $table->integer('status')->default('2');
            $table->integer('prove_id')->nullable();
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
        Schema::dropIfExists('myrequests');
    }
}
