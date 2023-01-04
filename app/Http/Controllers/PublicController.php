<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$bookcount = DB::table('book')->count();

			$allbooks = DB::table('book')
									->leftJoin('category', 'book.id_kategori', '=', 'category.id_kategori')
									->select('book.*', 'category.*')
									->get();

			$categories = DB::table('category')->get();
			$querycategories = $allbooks->count();
			$categoriescount = DB::table('category')->count();

			$books;
			$queries = request(["search", "category"]);
			if (count($queries) != 0) {
				$bookName = $queries["search"];
				$category = $queries["category"];

				$books = Book::where([
					["judul_buku", "LIKE", "%$bookName%"],
					["id_kategori", "=", $category]
					])->where("id_kategori", "!=", 0)->latest()->get();
			} else {
				$books = DB::table('book')
									->leftJoin('category', 'book.id_kategori', '=', 'category.id_kategori')
									->select('book.*', 'category.*')
									->simplePaginate(12);
			}

			return view('user.public', [
				'books' => $books,
				'bookcount' => $bookcount,
				'categories' => $categories,
				'categoriescount' => $categoriescount,
				'querycategories' => $querycategories
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
			$book = DB::table('book')
									->leftJoin('category', 'book.id_kategori', '=', 'category.id_kategori')
									->select('book.*', 'category.*')
									->where('book.id_buku', '=', $id)
									->get()->first();
						
			return view("user.show")->with(["book" => $book]);
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

		public function search(Request $request)
		{
			// menangkap data pencarian
			$search = $request->search;
	
					// mengambil data dari table pegawai sesuai pencarian data
			$allBooks = DB::table('book')
							->where('judul_buku','like',"%".$search."%")
							->get();

			$books = DB::table('book')
							->where('judul_buku','like',"%".$search."%")
							->simplePaginate(12);

			$bookcount = DB::table('book')->count();
			$categories = DB::table('category')->get();
			$querycategories = $allBooks->count();
			$categoriescount = DB::table('category')->count();

			return view('user.public', [
				'books' => $books,
				'bookcount' => $bookcount,
				'categories' => $categories,
				'categoriescount' => $categoriescount,
				'querycategories' => $querycategories
			]);
		}

		public function category(Request $request, $id)
		{	
			$allBooks = DB::table('book')
							->where('id_kategori','=',$id)
							->get();

			$books = DB::table('book')
							->where('id_kategori','=',$id)
							->simplePaginate(12);
							
			$bookcount = DB::table('book')->count();
			$categories = DB::table('category')->get();
			$querycategories = $allBooks->count();
			$categoriescount = DB::table('category')->count();

			return view('user.public', [
				'books' => $books,
				'bookcount' => $bookcount,
				'categories' => $categories,
				'categoriescount' => $categoriescount,
				'querycategories' => $querycategories
			]);
		}
}
