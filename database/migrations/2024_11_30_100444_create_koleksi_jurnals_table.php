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
        Schema::create('koleksi_jurnals', function (Blueprint $table) {
            $table->id('id_koleksijurnal');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_jurnal');
            $table->year('tahun');
            $table->enum('semester', ['Ganjil', 'Genap', ''])->nullable();
            $table->enum('tingkat', ['Internasional', 'Terakreditasi', ''])->nullable();
            $table->string('penerbit');
            $table->unsignedBigInteger('volume');
            $table->unsignedBigInteger('jumlah_eksemplar');
            $table->text('deskripsi');
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('koleksi_jurnals', function (Blueprint $table){
            $table->dropColumn([
                'id_koleksi',
                'id_prodi',
                'nama_jurnal',
                'tahun',
                'semester',
                'tingkat',
                'penerbit',
                'volume',
                'jumlah_eksemplar',
                'deskripsi',
                'file',
            ]);
        });

        Schema::dropIfExists('koleksi_jurnals');
    }
};
