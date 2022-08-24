<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('konsultasi', function (Blueprint $table) {
            $table->dropColumn('jadwal_konsultasi');
            $table->timestamp('mulai_konsultasi')->nullable();
            $table->timestamp('selesai_konsultasi')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
