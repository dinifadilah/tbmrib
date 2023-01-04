<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBorrowingTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
			DB::unprepared('
			CREATE TRIGGER book_borrowing AFTER INSERT ON `borrowing` FOR EACH ROW
					BEGIN
							UPDATE book SET stok_buku=stok_buku-NEW.quantity
							WHERE id_buku = NEW.id_buku;
					END
			');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowing_trigger');
    }
}
