<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hoc_phans', function (Blueprint $table) {
            $table->id();
            $table->string('ma_hp');
            $table->string('ten_hp');
            $table->integer('so_tin_chi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoc_phans');
    }
};