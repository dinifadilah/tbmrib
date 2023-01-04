<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes([
	//ubah register menjadi false untuk menambah admin baru
	'register'=> true,
]);

Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('index');
Route::get('/search', [App\Http\Controllers\PublicController::class, 'search'])->name('search');
Route::get('/category/{id}', [App\Http\Controllers\PublicController::class, 'category'])->name('category');
Route::get('/book/{id}', [App\Http\Controllers\PublicController::class, 'show'])->name('show');

Route::group(['middleware' => ['auth']], function () {
	//dashboard
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
	Route::get('/home/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
	
	//books
	Route::get('/home/books', [App\Http\Controllers\BookController::class, 'index'])->name('index');
	Route::get('/home/books/add', [App\Http\Controllers\BookController::class, 'create'])->name('create');
	Route::post('/home/books', [App\Http\Controllers\BookController::class, 'store'])->name('store');
	Route::get('/home/book/show/{id}', [App\Http\Controllers\BookController::class, 'show'])->name('show');
	Route::get('/home/book/edit/{id}', [App\Http\Controllers\BookController::class, 'edit'])->name('edit');
	Route::put('/home/book/{id}', [App\Http\Controllers\BookController::class, 'update'])->name('update');
	Route::delete('/home/book/{id}', [App\Http\Controllers\BookController::class, 'destroy'])->name('destroy');
	Route::get('/home/books/print_books', [App\Http\Controllers\BookController::class, 'print_books'])->name('print_books');

	//members
	Route::get('/home/members', [App\Http\Controllers\MemberController::class, 'index'])->name('index');
	Route::get('/home/members/add', [App\Http\Controllers\MemberController::class, 'create'])->name('create');
	Route::post('/home/members', [App\Http\Controllers\MemberController::class, 'store'])->name('store');
	Route::get('/home/member/show/{id}', [App\Http\Controllers\MemberController::class, 'show'])->name('show');
	Route::get('/home/member/edit/{id}', [App\Http\Controllers\MemberController::class, 'edit'])->name('edit');
	Route::put('/home/member/{id}', [App\Http\Controllers\MemberController::class, 'update'])->name('update');
	Route::delete('/home/member/{id}', [App\Http\Controllers\MemberController::class, 'destroy'])->name('destroy');
	Route::get('/home/members/print_members', [App\Http\Controllers\MemberController::class, 'print_members'])->name('print_members');

	//borrowings
	Route::get('/home/borrowings', [App\Http\Controllers\BorrowingController::class, 'index'])->name('index');
	Route::get('/home/borrowings/add', [App\Http\Controllers\BorrowingController::class, 'create'])->name('create');
	Route::post('/home/borrowings', [App\Http\Controllers\BorrowingController::class, 'store'])->name('store');
	Route::get('/home/borrowing/show/{id}', [App\Http\Controllers\BorrowingController::class, 'show'])->name('show');
	Route::get('/home/borrowing/edit/{id}', [App\Http\Controllers\BorrowingController::class, 'edit'])->name('edit');
	Route::put('/home/borrowing/{id}', [App\Http\Controllers\BorrowingController::class, 'update'])->name('update');
	Route::put('/home/borrowing/return/{id}', [App\Http\Controllers\BorrowingController::class, 'bookReturn'])->name('bookReturn');
	Route::get('/home/borrowings/print_borrowings', [App\Http\Controllers\BorrowingController::class, 'print_borrowings'])->name('print_borrowings');
	
	//returns
	Route::get('/home/returns', [App\Http\Controllers\ReturnController::class, 'index'])->name('index');
	Route::get('/home/return/show/{id}', [App\Http\Controllers\ReturnController::class, 'show'])->name('show');
	Route::get('/home/returns/print_returns', [App\Http\Controllers\ReturnController::class, 'print_returns'])->name('print_returns');

	//categories
	Route::get('/home/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('index');
	Route::get('/home/categories/add', [App\Http\Controllers\CategoriesController::class, 'create'])->name('create');
	Route::post('/home/categories', [App\Http\Controllers\CategoriesController::class, 'store'])->name('store');
	Route::delete('/home/categories/{id}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('destroy');

	//profile
	Route::get('/home/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
	Route::get('/home/profile/edit/{id}', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit');
	Route::patch('/home/profile', [App\Http\Controllers\ProfileController::class, 'update'])
        ->name('admin.profile.update');
});