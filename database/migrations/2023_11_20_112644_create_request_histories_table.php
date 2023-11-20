<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('request_histories', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("request_id")->unsigned();
            $table->enum("status",["pending","approved","rejected"]);
            $table->timestamps();

            $table->foreign("request_id")->references("id")->on("requests");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_histories');
    }
};
