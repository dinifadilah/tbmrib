<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi');
						$table->integer('id_anggota')->unsigned();
						$table->integer('id_buku')->unsigned();
						$table->date('tanggal_pinjam');
						$table->date('tanggal_kembali');
						$table->date('tanggal_dikembalikan')->nullable();
						$table->integer('lama_peminjaman')->nullable();
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
        Schema::dropIfExists('transaction');
    }
}
