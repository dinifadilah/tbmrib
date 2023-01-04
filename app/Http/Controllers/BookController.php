<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$books = DB::table('book')
									->leftJoin('category', 'book.id_kategori', '=', 'category.id_kategori')
									->select('book.*', 'category.*')
									->get();

      return view('admin.books.index')->with("books", $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
				$categories = Category::all();
        return view('admin.books.add', [
					'categories' => $categories
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
			$this->validate($request, [
				'file' => 'image|mimes:jpeg,png,jpg|max:1024'
			]);
			
			if ($request->file('file')) {
				$file = $request->file('file');
				$nama_file = time()."_".$file->getClientOriginalName();
	
				// folder tempat  file diupload
				$tujuan_upload = 'data_file';
				$file->move($tujuan_upload,$nama_file);
			} else {
				$nama_file = 'default.png';
			}

			$book = new Book();
			$book->judul_buku = $request->judul_buku;
			$book->penulis = $request->penulis;
			$book->penerbit = $request->penerbit;
			$book->stok_buku = $request->stok_buku;
			$book->id_kategori = $request->id_kategori;
			$book->gambar_buku = $nama_file;
			$book->tahun_terbit = $request->tahun_terbit;
			$book->tanggal_masuk = $request->tanggal_masuk;
			$book->isbn = $request->isbn;
			$book->save();
		
			return redirect('/home/books')->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$book = DB::table('book')
									->leftJoin('category', 'book.id_kategori', '=', 'category.id_kategori')
									->select('book.*', 'category.*')
									->where('book.id_buku', '=', $id)
									->get()->first();
						
			return view("admin.books.show")->with(["book" => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
			$book = DB::table('book')
									->leftJoin('category', 'book.id_kategori', '=', 'category.id_kategori')
									->select('book.*', 'category.*')
									->where('book.id_buku', '=', $id)
									->get()->first();
			$category = Category::all();

			return view("admin.books.edit", [
				"book" => $book,
				"category" => $category
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
			$book = Book::where('id_buku', $id)->first();

			$this->validate($request, [
				'file' => 'image|mimes:jpeg,png,jpg|max:1024'
			]);
			
			if ($request->file('file')) {
				$file = $request->file('file');
				$nama_file = time()."_".$file->getClientOriginalName();

				// menghapus gambar lama
				$gambar_buku = $book->gambar_buku;
				if ($gambar_buku != 'default.png') {
					unlink(public_path('data_file/'.$gambar_buku));
				}
	
				// mengupload gambar
				$tujuan_upload = 'data_file';
				$file->move($tujuan_upload,$nama_file);
			} else {
				$nama_file = 'default.png';
			}
			
			$book->judul_buku = $request->judul_buku;
			$book->penulis = $request->penulis;
			$book->penerbit = $request->penerbit;
			$book->stok_buku = $request->stok_buku;
			$book->id_kategori = $request->id_kategori;
			$book->gambar_buku = $nama_file;
			$book->tahun_terbit = $request->tahun_terbit;
			$book->tanggal_masuk = $request->tanggal_masuk;
			$book->isbn = $request->isbn;
			$book->update();
		
			return redirect('/home/books')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			$book = Book::where('id_buku', $id)->first();
			$gambar_buku = $book->gambar_buku;
			unlink(public_path('data_file/'.$gambar_buku));
			

			// hapus data
  		$book->delete();

      return redirect('home/books')->with('success', 'data berhasil dihapus');
    }

		public function print_books()
		{
			$books = DB::table('book')
									->leftJoin('category', 'book.id_kategori', '=', 'category.id_kategori')
									->select('book.*', 'category.*')
									->get();
			$dateNow = Carbon::now()->format('d M Y');
 
    	$pdf = PDF::loadView('admin.books.books_pdf',[
				'books' => $books,
				'dateNow' => $dateNow
			]);
    	return $pdf->stream('laporan-daftar-buku.pdf');
		}
}
