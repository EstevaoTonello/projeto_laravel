<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('descricao', 255)->nullable();
            $table->decimal('preco', 10, 2);
            $table->date('data_lancamento');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('desenvolvedora_id');
            $table->unsignedBigInteger('plataforma_id');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('desenvolvedora_id')->references('id')->on('desenvolvedoras')->onDelete('cascade');
            $table->foreign('plataforma_id')->references('id')->on('plataformas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jogos');
    }
};
