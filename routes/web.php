<?php
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\MyExportImportController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('posts/{post}','Blog\PostController@show')->name('blog.show');
Route::get('categories/{category}','Blog\PostController@category')->name('blog.category');
Route::get('tags/{tag}','Blog\PostController@tag')->name('blog.tag');


Route::middleware(['auth'])->group(function(){
    
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::middleware(['auth','admin'])->group(function(){

    Route::get('trashed','PostController@trashed')->name('post.trashed');
    Route::put('post/{post}/restore','PostController@restore')->name('post.restore');
    Route::get('image/{filename}', 'PostController@displayImage')->name('image.displayImage');
    Route::get('category/check_slug','CategoryController@checkSlug')->name('category.check_slug');
    Route::get('tag/check_slug','TagController@checkSlug')->name('tag.check_slug');
    Route::get('post/check_slug','PostController@checkSlug')->name('post.check_slug');
    Route::resource('category','CategoryController');
    Route::resource('post','PostController');
    Route::resource('tag','TagController');
   
    Route::post('users/{user}/makeAdmin','UserController@makeAdmin')->name('user.makeAdmin');
    Route::get('users/profile','UserController@edit')->name('users.edit');
    Route::put('users/profile','UserController@update')->name('user.update');
    Route::get('users','UserController@index')->name('user.index');
});


Auth::routes();
Route::get('sitemap.xml','SitemapController@index');



// Export Import Controller

Route::get('importExportView', [ MyExportImportController::class, 'importExportView' ])->name('importExportView');

Route::get('export', [ MyExportImportController::class, 'export' ])->name('export');

Route::post('import', [ MyExportImportController::class, 'import' ])->name('import');