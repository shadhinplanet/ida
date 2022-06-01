<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaner_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('loan_id');
            $table->string('address', 255);
            $table->string('nid', 255);
            $table->enum('business_category', ['A','B']);
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
        Schema::dropIfExists('loaner_information');
    }
};
