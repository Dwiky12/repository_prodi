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
        Schema::create('jenis_ruangs', function (Blueprint $table) {
            $table->id('id_jenisruangan');
            $table->string('jenis_ruangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jenis_ruangs', function (Blueprint $table){
            $table->dropColumn([
                'id_jenisruangan',
                'jenis_ruangan',
            ]);
        });
        Schema::dropIfExists('jenis_ruangs');
    }
};
