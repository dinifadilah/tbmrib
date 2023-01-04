<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$borrowings = DB::table('borrowing')
												->join('member', 'borrowing.id_anggota', '=', 'member.id_anggota')
												->join('book', 'borrowing.id_buku', '=', 'book.id_buku')
												->select('borrowing.*', 'member.*', 'book.*')
												->get();
			
			$dateNow = Carbon::now()->toDate();

      return view('admin.borrowing.index')->with([
				"borrowings" => $borrowings,
				"dateNow" => $dateNow
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
			$members = Member::all();
			$books = DB::table('book')
								->where('book.stok_buku', '>', 0)
								->get();
			$dateNow = Carbon::now()->toDateString();
			$dateNextToSeventDay = Carbon::now()->addDay(7)->toDateString();
			return view('admin.borrowing.add')->with([
				'members' => $members,
				'books' => $books,
				'dateNow' => $dateNow,
				'dateNextToSeventDay' => $dateNextToSeventDay
			]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$borrowing = new Borrowing();
			$borrowing->id_anggota = $request->id_anggota;
			$borrowing->id_buku = $request->id_buku;
			$borrowing->tanggal_pinjam = $request->tanggal_pinjam;
			$borrowing->tanggal_kembali = $request->tanggal_kembali;
			$borrowing->save();
		
			return redirect('/home/borrowings')->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$borrowing = DB::table('borrowing')
												->join('member', 'borrowing.id_anggota', '=', 'member.id_anggota')
												->join('book', 'borrowing.id_buku', '=', 'book.id_buku')
												->join('category', 'book.id_kategori', '=', 'category.id_kategori')
												->select('borrowing.*', 'member.*', 'book.*', 'category.*')
												->where('borrowing.id_peminjaman', '=', $id)
												->get()->first();

			return view("admin.borrowing.show")->with("borrowing", $borrowing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$borrowing = DB::table('borrowing')
										->join('member', 'borrowing.id_anggota', '=', 'member.id_anggota')
										->join('book', 'borrowing.id_buku', '=', 'book.id_buku')
										->select('borrowing.*', 'member.*', 'book.*')
										->where('borrowing.id_peminjaman', '=', $id)
										->get()->first();

			$dateNow = Carbon::now()->toDateString();
			$dateNextToSeventDay = Carbon::now()->addDay(7)->toDateString();
			return view("admin.borrowing.edit")->with([
				"borrowing" => $borrowing,
				"dateNow" => $dateNow,
				"dateNextToSeventDay" => $dateNextToSeventDay
			]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			$borrowing = Borrowing::find($id);
			$borrowing->id_anggota = $request->id_anggota;
			$borrowing->id_buku = $request->id_buku;
			$borrowing->tanggal_pinjam = $request->tanggal_pinjam;
			$borrowing->tanggal_kembali = $request->tanggal_kembali;
			$borrowing->update();

			return redirect('/home/borrowings')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

		public function bookReturn(Request $request, $id)
    {
			$tanggal_pinjam = $request->tanggal_pinjam;

			$datetime_pinjam = new DateTime($tanggal_pinjam);
			$datetime_dikembalikan = Carbon::now()->toDate();
			$durasi_peminjaman = $datetime_pinjam->diff($datetime_dikembalikan)->days;

			$borrowing = Borrowing::find($id);
			$borrowing->id_anggota = $request->id_anggota;
			$borrowing->id_buku = $request->id_buku;
			$borrowing->tanggal_pinjam = $tanggal_pinjam;
			$borrowing->tanggal_kembali = $request->tanggal_kembali;
			$borrowing->status_peminjaman = $request->status_peminjaman;
			$borrowing->tanggal_dikembalikan = $datetime_dikembalikan;
			$borrowing->durasi_peminjaman = $durasi_peminjaman;
			$borrowing->update();

			return redirect('/home/borrowings')->with('success', 'data berhasil dikembalikan');
    }

		public function print_borrowings()
		{
			$borrowings = DB::table('borrowing')
												->join('member', 'borrowing.id_anggota', '=', 'member.id_anggota')
												->join('book', 'borrowing.id_buku', '=', 'book.id_buku')
												->select('borrowing.*', 'member.*', 'book.*')
												->get();
    	$dateNow = Carbon::now()->format('d M Y');
 
    	$pdf = PDF::loadView('admin.borrowing.borrowings_pdf',[
				'borrowings' => $borrowings,
				'dateNow' => $dateNow
			]);
    	return $pdf->stream('laporan-daftar-peminjaman.pdf');
		}
}
