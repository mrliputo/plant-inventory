<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lokal');
            $table->string('spesies');
            $table->string('genus');
            $table->string('famili');
            $table->string('ordo');
            $table->string('subkelas');
            $table->string('kelas');
            $table->string('divisi');
            $table->string('superdivisi');
            $table->string('subkingdom');
            $table->string('kingdom');
            $table->mediumText('botani');
            $table->mediumText('syarat_tumbuh');
            $table->mediumText('manfaat');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
