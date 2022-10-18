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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("contract_number");
            $table->date("awarded_date");
            $table->float("amount");
            $table->string("client_name");
            $table->string("image");
            $table->boolean("completed")->default(false);
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("id")->on("project_categories");
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
        Schema::dropIfExists('projects');
    }
};
