<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShareButtonsController;
use App\Http\Controllers\StudentController;
use App\Models\Post;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user.home', [
//         'blog' => Post::latest()->get(),
        
//     ]);
// });


Route::get('/', function () {
    return view('user.home', [
    //  'blog' => Post::with('category')->latest()->where('status', 0)->get(),

        'blog' => Post::latest()->where('status', 0)->get(),
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

 require __DIR__.'/adminauth.php';
Route::get('/home/{post}', [PostController::class, 'show']);


Route::prefix('admin')->group(function () {

    //Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::get('/add-category', [CategoryController::class, 'Create']);

    Route::post('/add-category', [CategoryController::class, 'store']);

    Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit']);

    Route::put('/update-category/{category_id}', [CategoryController::class, 'update']);

    Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy']);

});

Route::get('/post',[PostController::class, 'index']);

Route::get('/add-post',[PostController::class, 'create']);

Route::post('/add-post',[PostController::class, 'store']);

//Route for the user resource controller
Route::resource('admin', AdminController::class);

//create a route for student-blog so that student can view the blog they posted
Route::get('/student-blog', [PostController::class, 'studentBlog']);

Route::post('/add-post',[PostController::class, 'store']);

Route::get('/post-edit/{post_id}', [PostController::class, 'edit']);

Route::put('update-post/{post_id}', [PostController::class, 'update']);

Route::get('/post-delete/{post_id}', [PostController::class, 'destroy']);

Route::get('/search', [PostController::class, 'search']);


Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->middleware(['auth:student', 'verified'])->name('student.dashboard');

require __DIR__.'/studentauth.php';

//Route for the student resource controller
Route::resource('student', StudentController::class);

// Route::get('/student/pending', [StudentController::class, 'pending'])->name('student.pending');

// Route::get('/student/pending', function () {
//     return view('admin.student.pending', [
//         //get all the students that are not approved yet
//         'pendingstudents' => Student::where('is_approved', false)->get()

//     ]);
// })-> name('student.pending');

//Route for the showpending method in student controller
Route::get('/pending', [StudentController::class, 'showpending'])->name('student.pending');

Route::get('/status', function () {
    return view('admin.student.status');
})->name('student.status');

//Creating the route for the student.status to show the page /admin/student/status.blade.php
// Route::get('/student/status', function () {
//     return view('admin.student.status');
// })->name('student.status');

// Route::get('/admin/student/status', function () { //This is the route to the page in the browser
//     return view('admin/student/staus'); //This is the path to the file in the views folder
// })->name('student.status');     //This is the name of the route

// Route::get('/student/pending', [StudentController::class, 'pending'])->name('student.pending');

// Route::get('/student/pending', function () {
//     return view('admin.student.pending', [
//         //get all the students that are not approved yet
//         'pendingstudents' => Student::where('is_approved', false)->get()

//     ]);
// })-> name('student.pending');

//Route for the showpending method in student controller
Route::get('/pending', [StudentController::class, 'showpending'])->name('student.pending');

Route::get('/status', function () {
    return view('admin.student.status');
})->name('student.status');

//Creating the route for the student.status to show the page /admin/student/status.blade.php
// Route::get('/student/status', function () {
//     return view('admin.student.status');
// })->name('student.status');

// Route::get('/admin/student/status', function () { //This is the route to the page in the browser
//     return view('admin/student/staus'); //This is the path to the file in the views folder
// })->name('student.status');     //This is the name of the route

Route::get('/manage', [PostController::class, 'manage']);


Route::get('/survey',[App\Http\Controllers\SurveyController::class, 'index']);
Route::get('/add-survey',[App\Http\Controllers\SurveyController::class, 'create']);
// Route::post('/add-survey',[App\Http\Controllers\SurveyController::class, 'store']);

Route::post('/update-survey',[App\Http\Controllers\SurveyController::class, 'update']);

Route::get('/survey-edit/{survey_id}', [App\Http\Controllers\SurveyController::class, 'edit']);
Route::put('/edit-update-survey/{survey_id}', [App\Http\Controllers\SurveyController::class, 'editupdate']);


Route::get('/survey-delete/{survey_id}', [App\Http\Controllers\SurveyController::class, 'destroy']);



// Route::get('/post-delete/{post_id}', [PostController::class, 'destroy']);

Route::get('/view-survey', [App\Http\Controllers\SurveyController::class, 'show']);

Route::get('/survey/manage', [App\Http\Controllers\SurveyController::class, 'manage']);

Route::get('/terms', function () {
    return view('post.terms-and-cond', [
    ]);
});

Route::get('/blogpost', [ShareButtonsController::class, 'share']);