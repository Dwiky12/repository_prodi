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
        Schema::create('pengabdians', function (Blueprint $table) {
            $table->id('id_pengabdian');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_kegiatan');
            $table->year('tahun');
            $table->unsignedBigInteger('jumlah_peserta');
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('id_prodi')->references('id_prodi')->on('pengabdians')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengabdians', function (Blueprint $table){
            $table->dropColumn([
                'id_pengabdian',
                'id_prodi',
                'nama_kegiatan',
                'tahun',
                'jumlah_peserta',
                'file',
            ]);
        });
        Schema::dropIfExists('pengabdians');
    }
};
