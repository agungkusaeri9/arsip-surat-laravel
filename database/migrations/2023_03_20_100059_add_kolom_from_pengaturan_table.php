<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengaturan', function (Blueprint $table) {
            $table->string('email')->nullable()->after('deskripsi');
            $table->string('kode_pos')->nullable()->after('email');
            $table->string('nama_kepala_sekolah')->nullable()->after('kode_pos');
            $table->string('nip_kepala_sekolah')->nullable()->after('nama_kepala_sekolah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengaturan', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('kode_pos');
            $table->dropColumn('nama_kepala_sekolah');
            $table->dropColumn('nip_kepala_sekolah');
        });
    }
};
