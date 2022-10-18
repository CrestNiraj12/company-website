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
        Schema::create('guarantee_files', function (Blueprint $table) {
            $table->id();
            $table->date("issued_date");
            $table->date("end_date");
            $table->string("path");
            $table->unsignedBigInteger("guarantee_id");
            $table->foreign("guarantee_id")->references("id")->on("guarantees");
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
        Schema::dropIfExists('guarantee_files');
    }
};
