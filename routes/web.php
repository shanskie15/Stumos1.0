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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*ADMIN PANEL*/
Route::middleware(['admin_type'])->group(function () {
    Route::resource('admin', 'AdminController', ['except' => ['destroy','show','update','create','edit','store']]);
    Route::prefix('admin')->group(function () {
        Route::get('/', ['as' => 'admin.index','uses' => 'AdminController@index']);
    });

    Route::prefix('employee')->group(function () {
        Route::get('/export', 'EmployeeController@export')->name('employee.export');
        Route::post('/import', 'EmployeeController@import')->name('employee.import');
        Route::get('/history', 'EmployeeController@history')->name('employee.history');
        Route::get('/{employee}/edit', 'EmployeeController@edit')->name('employee.edit');
        Route::put('/{employee}', 'EmployeeController@update')->name('employee.update');
        Route::delete('/soft/{id}','EmployeeController@delete');
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
    Route::resource('counselor', 'CounselorController');
        Route::prefix('counselor')->group(function () {
        Route::get('/',['as' => 'counselor.index','uses' => 'CounselorController@index']);
     });
     Route::get('/badrecord', 'CounselorController@createBadRecord');
     Route::get('/counsel', 'CounselorController@createCounsel');
     Route::post('/storeBad', 'CounselorController@storeBad');
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
     Route::resource('librarian', 'LibrarianController');
     Route::prefix('librarian')->group(function () {
        Route::delete('/soft/{id}','LibrarianController@delete');
         Route::get('/',['as' => 'librarian.index','uses' => 'LibrarianController@index']);
          //  Route::get('/{librarian}/edit', ['as' => 'librarian.edit', 'uses' => 'LibrarianController@edit']);
        //  Route::put('/{librarian}', ['as' => 'librarian.update', 'uses' => 'LibrarianController@update']);

     });
     Route::get('/borrow','LibrarianController@borrowindex');

 });
/*END LIBRARIAN PANEL*/

/*PRINCIPAL PANEL*/
// Route::middleware(['principal_type'])->group(function () {
//     Route::resource('principal', 'PrincipalController');
//     Route::prefix('principal')->group(function () {
//         Route::get('/',['as' => 'principal.index','uses' => 'PrincipalController@index']);
//     });
// });
/*END PRINCIPAL PANEL*/

