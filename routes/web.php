<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminAuthentication;
use App\Http\Controllers\Admin\AdminContents;
use App\Http\Middleware\AdminUsersAccessible;
use App\Http\Controllers\PageContent;
use App\Http\Controllers\PayroLink\Payment;

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

Route::post('link/payment', [Payment::class, 'getlink'])->name('link_payment');

Route::get('{key}', [PageContent::class, 'index'])->where('key', '[A-Za-z0-9]*')->name('page_content');
Route::get('{key}/{amount}', [PageContent::class, 'index'])->where('key', '[A-Za-z0-9]*')->where('amount', '[0-9]*')->name('page_content_amount');
Route::post('link/{alias}/callback', [Payment::class, 'callback'])->name('link_payment_callback');
Route::get('link/download/receipt/{data}', [Payment::class, 'downloadReceiptPdf'])->name('link_payment_download_receipt');
Route::get('link/callback/test', [Payment::class, 'callbackTest'])->name('link_payment_callback_test');


Route::get('admin/login', [AdminAuthentication::class, 'index'])->name('admin_login');
Route::post('admin/login', [AdminAuthentication::class, 'login'])->name('admin_login_post');

Route::group(['middleware' => [AdminUsersAccessible::class]], function () {
    Route::get('admin/contents', [AdminContents::class, 'index'])->name('admin_contents');
    Route::get('admin/contents/new', [AdminContents::class, 'new'])->name('admin_contents_new');
    Route::get('admin/contents/edit/{edit_id}', [AdminContents::class, 'form'])->name('admin_contents_form');
    Route::post('admin/contents/edit/{edit_id}', [AdminContents::class, 'edit'])->name('admin_contents_edit');
    Route::get('admin/contents/delete/{edit_id}', [AdminContents::class, 'delete'])->name('admin_contents_delete');

    Route::get('admin/signout', [AdminAuthentication::class, 'signout'])->name('admin_signout');

});

