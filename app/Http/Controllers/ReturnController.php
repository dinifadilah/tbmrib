<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$returns = DB::table('borrowing')
										->join('member', 'borrowing.id_anggota', '=', 'member.id_anggota')
										->join('book', 'borrowing.id_buku', '=', 'book.id_buku')
										->select('borrowing.*', 'member.*', 'book.*')
										->where('borrowing.status_peminjaman', '=', 0)
										->get();

			$dateNow = Carbon::now()->toDate();

			return view('admin.returns.index')->with([
			"returns" => $returns,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$return = DB::table('borrowing')
										->join('member', 'borrowing.id_anggota', '=', 'member.id_anggota')
										->join('book', 'borrowing.id_buku', '=', 'book.id_buku')
										->join('category', 'book.id_kategori', '=', 'category.id_kategori')
										->select('borrowing.*', 'member.*', 'book.*', 'category.*')
										->where('borrowing.id_peminjaman', '=', $id)
										->get()->first();

										return view("admin.returns.show")->with("return", $return);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

		public function print_returns()
		{
			$returns = DB::table('borrowing')
										->join('member', 'borrowing.id_anggota', '=', 'member.id_anggota')
										->join('book', 'borrowing.id_buku', '=', 'book.id_buku')
										->select('borrowing.*', 'member.*', 'book.*')
										->where('borrowing.status_peminjaman', '=', 0)
										->get();
    	$dateNow = Carbon::now()->format('d M Y');
 
    	$pdf = PDF::loadView('admin.returns.returns_pdf',[
				'returns' => $returns,
				'dateNow' => $dateNow
			]);
    	return $pdf->stream('laporan-daftar-peminjaman.pdf');
		}
}
