<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawantrdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawantrds', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('nik');
            $table->text('npwp');
            $table->text('jbtn');
            $table->text('alamat');
            $table->integer('tgngn');
            $table->integer('penghasilan');
            $table->integer('pajakhasil')->default(0);
            $table->boolean('stats');
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
        Schema::dropIfExists('karyawantrds');
    }
}
