<?php
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
Route::get('/', 'HomeController@index')->name('welcome.login');
Route::get('/error', 'HomeController@approval')->name('error.login');

/*LOGIN ROUTES*/
Route::get('/admin/dashboard', 'Admin\SuperadminController@index')->name('superadmin.dashboard');
Route::get('/librarian/dashboard', 'Librarian\LibrarianController@index')->name('librarian.dashboard');
Route::get('/student', 'Student\StudentController@index')->name('student.dashboard'); 

Auth::routes();
////////////////Start Book Management View////////////////
Route::get('/bookmgnt', 'Admin\BookController@index');
Route::post('/addbook', 'Admin\BookController@addbook');
Route::get('/editBook', 'Admin\BookController@editBook');
Route::post('/editBookList', 'Admin\BookController@editBookList');
Route::get('/deleteBook/{id}', 'Admin\BookController@deleteBook');
////////////////Start user Management View////////////////
Route::get('/users', 'Admin\UserController@index');
Route::post('/adduser', 'Admin\UserController@adduser'); 
Route::get('/deleteuser/{id}', 'Admin\UserController@delete_user');
Route::get('/view/user/{user}', 'Admin\UserController@viewuser_prof')->name('view.user.profile');
Route::get('/viewprof/{user}/edit', 'Admin\UserController@edituser_prof');
Route::patch('/update_userprof/{user}', 'Admin\UserController@update_userprof');

////////////////Start pending Reservation View////////////////
Route::get('/pendingreservation', 'Admin\ReservationController@pending');
Route::get('/approve_reservation', 'Admin\ReservationController@list_approved');
Route::get('/reserved/{reservation}', 'Admin\ReservationController@approve');
Route::get('/delete/reservation/{id}', 'Admin\ReservationController@cancel_reservation');
////////////////Start pendning View////////////////
Route::get('/pendinguser', 'Admin\UserApprovalController@index');
Route::get('/approved/{user}', 'Admin\UserApprovalController@approve');
Route::get('/removereq/{id}', 'Admin\UserApprovalController@reject_user');
////////////////Start view own profile////////////////
Route::get('/admin/profile/', 'Admin\ProfileController@index')->name('admin.profile.show');
Route::get('/admin/profile/edit', 'Admin\ProfileController@edit')->name('admin.profile.edit');
Route::patch('/admin/profile/update', 'Admin\ProfileController@update')->name('admin.profile.update');
Route::patch('/admin/password/update', 'Admin\ProfileController@updatepassword')->name('admin.profile.updatepassword');

//////////////////////////////////////////// STUDENT ROUTES ///////////////////////////////////////////////////////////
Route::resource('/availablebooks', 'Student\ReservebookController@index');
Route::post('/reserve_book/{book}', 'Student\StudentController@reserve');
Route::get('/student/profile', 'Student\ProfileController@profile')->name('student.profile.show');
Route::get('/edit', 'Student\ProfileController@edit')->name('student.profile.edit');
Route::patch('/student/profile/update', 'Student\ProfileController@update')->name('student.profile.update');
Route::patch('/student/password/update', 'Student\ProfileController@updatepassword')->name('student.profile.updatepassword');

//////////////////////////////////////////// LIBRARIAN ROUTES////////////////////////////////////////////////////////
Route::get('/view_book', 'Librarian\BookController@index');
Route::post('/lib_addbook', 'Librarian\BookController@addbook');
Route::get('/lib_editBook', 'Librarian\BookController@editBook');
Route::post('/lib_editBookList', 'Librarian\BookController@editBookList');
Route::get('/lib_deleteBook/{book_id}', 'Librarian\BookController@deleteBook');
////////////////Start Reservation View////////////////
Route::get('/pending', 'Librarian\ReservationController@pending');
Route::get('/reserved', 'Librarian\ReservationController@list_approved');
Route::get('/lib_reserved/{reservation}', 'Librarian\ReservationController@approve');
Route::get('/lib_cancelres/{id}', 'Librarian\ReservationController@cancel_reservation');
////////////////Start view own profile////////////////
Route::get('/librarian/profile', 'Librarian\ProfileController@index')->name('librarian.profile.show');
Route::get('librarian/edit', 'Librarian\ProfileController@edit')->name('librarian.profile.edit');
Route::patch('/librarian/profile/update', 'Librarian\ProfileController@update')->name('librarian.profile.update');
Route::patch('/librarian/password/update', 'Librarian\ProfileController@updatepassword')->name('librarian.profile.updatepassword');
