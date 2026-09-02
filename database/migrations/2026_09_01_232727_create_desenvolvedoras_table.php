<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('desenvolvedoras', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('pais', 255);
            $table->integer('ano_fundacao');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desenvolvedoras');
    }
};
