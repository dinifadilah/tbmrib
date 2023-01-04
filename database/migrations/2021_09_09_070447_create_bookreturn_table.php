<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookreturnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookreturn', function (Blueprint $table) {
						$table->bigIncrements('id_pengembalian');
						$table->unsignedBigInteger('id_anggota');
						$table->unsignedBigInteger('id_buku');
						$table->date('tanggal_pinjam');
						$table->date('tanggal_kembali');
						$table->integer('quantity')->default(1);

            $table->timestamps();
						
						$table->foreign('id_anggota')->references('id_anggota')->on('member');
						$table->foreign('id_buku')->references('id_buku')->on('book');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookreturn');
    }
}
