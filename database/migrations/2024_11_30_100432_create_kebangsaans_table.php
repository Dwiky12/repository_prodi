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
        Schema::create('kebangsaans', function (Blueprint $table) {
            $table->id('id_kebangsaan');
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_tingkat');
            $table->string('nama_kegiatan');
            $table->year('tahun');
            $table->string('url_penyelenggara');
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tingkat')->references('id_tingkat')->on('tingkats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kebangsaans', function (Blueprint $table){
            $table->dropColumn([
                'id_kebangsaan',
                'id_prodi',
                'id_kategori',
                'id_tingkat',
                'nama_kegiatan',
                'tahun',
                'url_penyelenggara',
                'file',
            ]);
        });
        Schema::dropIfExists('kebangsaans');
    }
};
