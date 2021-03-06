<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

/*ADMIN PANEL*/
Route::middleware(['admin_type'])->group(function () {
    Route::resource('admin', 'AdminController', ['except' => ['destroy','show','update','create','edit','store']]);
    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
    });

    Route::prefix('employee')->group(function () {
        Route::get('/export', 'EmployeeController@export')->name('employee.export');
        Route::post('/import', 'EmployeeController@import')->name('employee.import');
        Route::get('/history', 'EmployeeController@deleteHistory')->name('employee.history');
        Route::get('/{employee}/edit', 'EmployeeController@edit')->name('employee.edit');
        Route::put('/{employee}', 'EmployeeController@update')->name('employee.update');
        Route::delete('/soft/{id}','EmployeeController@delete');
        Route::get('/recover/{id}','EmployeeController@recover');
    });
    Route::resource('employee', 'EmployeeController');


    Route::prefix('student')->group(function () {
        // Route::get('/export', ['as' => 'student.export','uses' => 'StudentController@export']);
        Route::post('/import', 'StudentController@import')->name('student.import');
        Route::get('/history', 'StudentController@history')->name('student.history');
        Route::get('/{student}/edit', 'StudentController@edit')->name('student.edit');
        Route::put('/{student}', 'StudentController@update')->name('student.update');
        Route::delete('/soft/{id}','StudentController@delete');
    });
    Route::resource('student', 'StudentController');

    Route::prefix('section')->group(function () {
        //     Route::get('/export', ['as' => 'section.export','uses' => 'SectionController@export']);
        Route::post('/import', 'SectionController@import')->name('section.import');
        Route::get('/history', 'SectionController@history')->name('section.history');
        Route::get('/{section}/edit', 'SectionController@edit')->name('section.edit');
        Route::put('/{section}', 'SectionController@update')->name('section.update');
        Route::delete('/soft/{id}','SectionController@delete');
    });
    Route::resource('section', 'SectionController');
});

/*END ADMIN PANEL*/

/*TEACHER PANEL*/
Route::middleware(['teacher_type'])->group(function () {
    Route::prefix('teacher')->group(function () {
        Route::get('/', ['as' => 'teacher.index','uses' => 'TeacherController@index']);
    });
    Route::get('/attendance', 'TeacherController@attendance');
    Route::resource('teacher', 'TeacherController');
});
/*END TEACHER PANEL*/

/*COUNSELOR PANEL*/
Route::middleware(['counselor_type'])->group(function () {
    Route::prefix('counselor')->group(function () {
    Route::get('/',['as' => 'counselor.index','uses' => 'CounselorController@index']);
    Route::get('studentprofile/{id}', 'CounselorController@showProfile')->name('studentprofile');
    Route::get('studentcounselling/{id}', 'CounselorController@showCounsellingProfile')->name('studentcounselling');
    Route::get('studentbadrecords/{id}', 'CounselorController@studentBadRecordProfile')->name('studentbadrecords');
    });

    Route::get('/badrecord', 'CounselorController@createBadRecord');
    Route::get('/counsel', 'CounselorController@createCounsel');
    Route::post('/storeBad', 'CounselorController@storeBad');
    Route::post('/storeCounsel', 'CounselorController@storeCounsel');
    Route::resource('counselor', 'CounselorController');

});
/*END COUNSELOR PANEL*/

/*HEALTH CARE PROFESSIONAL PANEL*/
Route::middleware(['healthcare_type'])->group(function () {
    Route::resource('healthcareprofessional', 'HealthCareController');
    Route::prefix('healthcareprofessional')->group(function () {
        Route::get('/',['as' => 'healthcareprofessional.index','uses' => 'HealthCareController@index']);
    });
    Route::get('/consultation','HealthCareController@consultation');
    Route::get('/history','HealthCareController@history');
});
/*END HEALTH CARE PROFESSIONAL PANEL*/

/*LIBRARIAN PANEL*/
Route::middleware(['librarian_type'])->group(function () {
    Route::prefix('library')->group(function () {
        Route::get('/','LibraryController@index')->name('library.index');
    });
    Route::get('/borrow','LibraryController@borrowindex')->name('borrow.index');
    Route::get('/detail/{id}','LibraryController@detail')->name('borrow.detail');
    Route::get('/viewreturned','LibraryController@viewreturned')->name('borrow.viewreturned');
    Route::post('/returned','LibraryController@returned')->name('borrow.detail');
    Route::get('/removereturned/{id}','LibraryController@removedreturned');
    Route::get('/returneddetail/{id}','LibraryController@returneddetail')->name('borrow.returneddetail');

   
    Route::resource('library', 'LibraryController', ['except' => ['destroy','update','edit','show']]);
});

// Route::prefix('librarian')->group(function () {
    // Route::post('/login','UserController@login');
// Route::get('getaddborrow','BorrowController@getaddborrow');

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/index','BorrowController@index')->name('library.index');

// Route::get('detail/{id}','BorrowController@detail');
// Route::get('returneddetail/{id}','BorrowController@returneddetail');
// Route::get('search','BorrowController@search');
// Route::post('returned','BorrowController@returned');
// Route::get('viewreturned','BorrowController@viewreturned');
// Route::get('removereturned/{id}','BorrowController@removedreturned');
// Route::post('addborrow','BorrowController@addborrow');
// Route::resource('librarian', 'BorrowController');
// });

/*END LIBRARIAN PANEL*/

/*PRINCIPAL PANEL*/
// Route::middleware(['principal_type'])->group(function () {
//     Route::resource('principal', 'PrincipalController');
//     Route::prefix('principal')->group(function () {
//         Route::get('/',['as' => 'principal.index','uses' => 'PrincipalController@index']);
//     });
// });
/*END PRINCIPAL PANEL*/

