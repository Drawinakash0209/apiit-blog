<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BlogReportController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

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


// Route::get('/', function () {
//     return view('user.home', [
//         'blog' => Post::latest()->filters(request(['tag']))->where('status', 0)->get(),
//         'recentblogs' => Post::latest()->take(3)->get(),
//         $mainBlogs = [],
//         for ($i = 0; $i < 6; $i++) {
//             $mainBlogs[$i] = $blogs->skip($i)->first();
//         }

//     ]);
// });

//Route::get('/', function () {
//    $user = auth()->user();
//    $blogs = Post::latest()->filters(request(['tag']))->where('status', 0)->get();
//    $recentblogs = Post::latest()->take(3)->get();
//
//    return view('user.home', compact('blogs', 'recentblogs'));
//});


Route::get('/', function () {
    $user = auth()->user(); // Retrieve the logged-in user

    $blogsQuery = Post::latest()->filters(request(['tag']))->where('status', 0); // Base query for all posts
    $blogs = collect(); // Empty collection to store all blogs

    if ($user) {
        $school = $user->school; // Get the user's school

        $featuredCategoryId = [
            'computing' => 8,
            'business' => 10,
            'law' => 9,
        ][$school] ?? null; // Map school to featured category ID

        if ($featuredCategoryId) {
            $featuredBlogs = $blogsQuery->where('category_id', $featuredCategoryId)->get();
            $blogs = $featuredBlogs->merge($blogsQuery->where('category_id', '!=', $featuredCategoryId)->get());
        } else {
            $blogs = $blogsQuery->get(); // No featured category, fetch all posts
        }
    } else {
        $blogs = $blogsQuery->get(); // Non-logged-in user, fetch all posts
    }

    $recentBlogs = Post::latest()->take(3)->get();

    return view('user.home', compact('blogs', 'recentBlogs'));
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


// Route::get('/student/dashboard', function () {
//     return view('student.dashboard');
// })->middleware(['auth:student', 'verified'])->name('student.dashboard');


Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->name('student.dashboard');

require __DIR__.'/studentauth.php';

//Route for the student resource controller
Route::resource('student', StudentController::class);


//Route for the showpending method in student controller
Route::get('/pending', [StudentController::class, 'showpending'])->name('student.pending');

Route::get('/status', function () {
    return view('admin.student.status');
})->name('student.status');


//Route for the showpending method in student controller
Route::get('/pending', [StudentController::class, 'showpending'])->name('student.pending');

Route::get('/status', function () {
    return view('admin.student.status');
})->name('student.status');


// Routes for the user management
Route::get('/user/index', [UserController::class, 'index'])-> name('user.index');
Route::get('/user/create', [UserController::class, 'create'])-> name('user.create');
Route::post('/user/store', [UserController::class, 'store'])-> name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])-> name('user.edit');
Route::put('/user/update/{id}/{user_type}', [UserController::class, 'update'])-> name('user.update');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])-> name('user.destroy');

//Route for the user.status without controllers
Route::get('/user/status', function () {
    return view('admin.user.status');
} )-> name('user.status');





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


Route::post('/report/blog/issue', [BlogReportController::class, 'store'])->name('report.blog.issue');

Route::get('/reports', [BlogReportController::class, 'index'])->name('reports');
