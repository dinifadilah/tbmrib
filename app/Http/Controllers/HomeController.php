<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
				return redirect('/home/dashboard');
    }

		public function dashboard() {
			$bookcount = DB::table('book')->count();
			$membercount = DB::table('member')->count();
			$borrowingcount = DB::table('borrowing')->count();
			$returncount = DB::table('borrowing')
												->where('borrowing.status_peminjaman', '=', 0)
												->count();

			return view('admin.dashboard')->with([
				'bookcount' => $bookcount,
				'membercount' => $membercount,
				'borrowingcount' => $borrowingcount,
				'returncount' => $returncount
			]);
		}
}
