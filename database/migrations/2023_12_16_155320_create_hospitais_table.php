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
        Schema::create('hospitais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->longText('logotipo');
            $table->longText('descricao');
            $table->string('endereco');
            $table->double('long')->nullable();
            $table->double('lat')->nullable();
            //$table->unsignedBigInteger('users_id');
            //$table->foreign('users_id')
                //->references('id')
                    //->on('users')
                        //->onDelete('CASCADE') // Corrigi o erro de sintaxe aqui
                            //->onUpdate('CASCADE');
            $table->unsignedBigInteger('tipo_hospitais_id');
            $table->foreign('tipo_hospitais_id')
                ->references('id')
                    ->on('tipo_hospitais')
                        ->onDelete('CASCADE') // Corrigi o erro de sintaxe aqui
                            ->onUpdate('CASCADE');
            $table->integer('estado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizacaos');
    }
};
