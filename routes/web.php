<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\Meetingcontroller;
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
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;

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

//route for homepage
Route::get('/', function () {

    $blogs = Post::latest()->filters(request(['tag']))->where('status', 0)->get();
    $recentblogs = Post::latest()->take(3)->get();

    return view('user.home', compact('blogs', 'recentblogs'));
});



//route for  Dashboard page
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//route for profile CRUD page
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Route for admin Dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

 require __DIR__.'/adminauth.php';
Route::get('/home/{post}', [PostController::class, 'show']);


//Route for the admin category controller
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

//Route for blog CRUD
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


//Route for the student dashboard
Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->name('student.dashboard');

require __DIR__.'/studentauth.php';

//Route for the student resource controller
Route::resource('student', StudentController::class);

//Route for the show pending method in student controller
Route::get('/pending', [StudentController::class, 'showpending'])->name('student.pending');

Route::get('/status', function () {
    return view('admin.student.status');
})->name('student.status');


//Route for the showpending method in student controller
Route::get('/pending', [StudentController::class, 'showpending'])->name('student.pending');

//Route to display pending students
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


//Route for the user status with controllers
Route::get('/manage', [PostController::class, 'manage']);

//Route for Survey CRUD
Route::get('/survey',[App\Http\Controllers\SurveyController::class, 'index']);
Route::get('/add-survey',[App\Http\Controllers\SurveyController::class, 'create']);
Route::post('/update-survey',[App\Http\Controllers\SurveyController::class, 'update']);
Route::get('/survey-edit/{survey_id}', [App\Http\Controllers\SurveyController::class, 'edit']);
Route::put('/edit-update-survey/{survey_id}', [App\Http\Controllers\SurveyController::class, 'editupdate']);
Route::get('/survey-delete/{survey_id}', [App\Http\Controllers\SurveyController::class, 'destroy']);
Route::get('/view-survey', [App\Http\Controllers\SurveyController::class, 'show']);
Route::get('/survey/manage', [App\Http\Controllers\SurveyController::class, 'manage']);


//Route for the Terms and conditions
Route::get('/terms', function () {
    return view('post.terms-and-cond', [
    ]);
});

//Route for the report blog issue
Route::post('/report/blog/issue', [BlogReportController::class, 'store'])->name('report.blog.issue');
Route::get('/reports', [BlogReportController::class, 'index'])->name('reports');
Route::get('/report-delete/{report_id}', [BlogReportController::class, 'destroy']);


// //Routes for feedback management
// Route::get('/feedback/index', [App\Http\Controllers\FeedbackController::class, 'index']);
// Route::get('/feedback/edit', [App\Http\Controllers\FeedbackController::class, 'edit']);
// Route::put('/feedback/update/{id}', [App\Http\Controllers\FeedbackController::class, 'update']);
// Route::get('/feedback/delete/{id}', [App\Http\Controllers\FeedbackController::class, 'destroy']);
// //pending feedback
// Route::get('/feedback/pending', [App\Http\Controllers\FeedbackController::class, 'pending']);
// //Feedback show
// Route::get('/feedback/show', [App\Http\Controllers\FeedbackController::class, 'show']);
// //Feedback store
//  Route::post('/feedback/store', [App\Http\Controllers\FeedbackController::class, 'store']);


//Route for the student resource controller
Route::resource('feedback', FeedbackController::class);

//Route for the feedback status
Route::get('/status', function () {
    return view('feedback.status');
} )-> name('feedback.status');

//Route for the show pending method in student controller
Route::get('/pending', [FeedbackController::class, 'showpending'])->name('feedback.pending');


//Route for Career Path (Job) CRUD
Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
Route::get('/job/edit/{job_id}', [JobController::class, 'edit'])->name('job.edit');
Route::put('/job/update/{job_id}', [JobController::class, 'update'])->name('job.update');
Route::delete('/job/delete/{job_id}', [JobController::class, 'destroy'])->name('job.delete');
Route::get('/jobs/show', [JobController::class, 'show'])->name('job.show');


//Routes for events
Route::get('/events', [EventController::class, 'index']);
Route::get('/add-events',[EventController::class, 'create']);
Route::post('/add-events', [EventController::class, 'store']);
Route::get('/manage-events', [EventController::class, 'manage']);
Route::get('/event-edit/{event_id}', [EventController::class, 'edit']);
Route::put('update-events/{event_id}', [EventController::class, 'update']);
Route::get('event-delete/{event_id}', [EventController::class, 'destroy']);


//Routes for meetings
Route::get('/meetings', [MeetingController::class, 'show'])->name('meetings.show');
