<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteSomeColumnOnBorrowingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			Schema::table('transaction', function (Blueprint $table) {
				$table->dropColumn('tanggal_dikembalikan');
				$table->dropColumn('lama_peminjaman');
				$table->boolean('status_peminjaman');
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
