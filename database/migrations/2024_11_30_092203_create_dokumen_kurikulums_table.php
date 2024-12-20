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
        Schema::create('dokumen_kurikulums', function (Blueprint $table) {
            $table->id('id_dokumenkurikulum');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_kurikulum');
            $table->year('tahun_pembelajaran');
            $table->enum('semester_pemberlakuan', ['Ganjil', 'Genap', ''])->nullable();
            $table->unsignedBigInteger('revisi_ke');
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
        Schema::table('dokumen_kurikulums', function (Blueprint $table){
            $table->dropColumn([
                'id_dokumenkurikulums',
                'id_prodi',
                'nama_kurikulum',
                'tahun_pembelajaran',
                'semester pemberlakuan',
                'revisi_ke',
                'file',
            ]);
        });

        Schema::dropIfExists('dokumen_kurikulums');
    }
};
