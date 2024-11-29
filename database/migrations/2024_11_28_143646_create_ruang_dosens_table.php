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
        Schema::create('ruang_dosens', function (Blueprint $table) {
            $table->id('id_ruangdosen');
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('jumlah');
            $table->double('luas');
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('ruang_dosens')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('ruang_dosens', function (Blueprint $table){
            $table->dropColumn([
                'id_ruangdosen',
                'id_prodi',
                'jumlah',
                'luas',
                'file',
            ]);
         });
        Schema::dropIfExists('ruang_dosens');
    }
};
