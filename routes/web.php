<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;

use App\Http\Livewire\Test\Test01;
use App\Http\Livewire\Test\Test02;

use App\Http\Livewire\StudentsInformation\Students_Information as StudentsInformation; //Leo
use App\Http\Livewire\Forms; //Por
use App\Http\Livewire\Ins001; //Por001
use App\Http\Livewire\Ins002; //Por002
use App\Http\Livewire\Ins003; //Por003
use App\Http\Livewire\Ins004; //Por004
use App\Http\Livewire\Ins005; //Por005
use App\Http\Livewire\Ins006; //Por006
// use App\Http\Livewire\Students_Information;

use App\Http\Livewire\WeekReport; //Ryu
use App\Http\Livewire\DailyReports; //Ryu2
use App\Http\Livewire\Dashboard\DashboardAdmin;
use App\Http\Livewire\Dashboard\DashboardStudent;
use App\Http\Livewire\Dashboard\DashboardTeacher;
use App\Http\Livewire\Report; //Ryu3
use App\Http\Livewire\Routedailyreport; //Ryu3

use App\Http\Livewire\Document; //Lek

use App\Http\Livewire\InformationS; //Leo
use App\Http\Livewire\FollowReport; //Ryu3
use App\Http\Livewire\Follow; //Ryu4

use App\Http\Livewire\StudentsCompanys; //Bank
use App\Http\Livewire\StudentsTeachers\StudentsTeacher; //Bank

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\ListStudents;
use App\Http\Livewire\ListTeachers;
use App\Http\Livewire\ProfileStudent;
use App\Http\Livewire\ProfileStudentS;
use App\Http\Livewire\StudentsTeachers;

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

Route::get('/', Login::class)->name('login');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/dashboard-student', DashboardStudent::class)->name('dashboard-student');
    Route::get('/dashboard-admin', DashboardAdmin::class)->name('dashboard-admin');
    Route::get('/dashboard-teacher', DashboardTeacher::class)->name('dashboard-teacher');

    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');

    Route::get('/test01', Test01::class)->name('test01');
    Route::get('/test02', Test02::class)->name('test02');

    // Route::get('/student-information', StudentsInformation::class)->name('student-information'); //Leo
    Route::get('/forms', Forms::class)->name('forms'); //Por
    Route::get('/ins001', Ins001::class)->name('ins001'); //Por001
    Route::get('/ins002', Ins002::class)->name('ins002'); //Por002
    Route::get('/ins003', Ins003::class)->name('ins003'); //Por003
    Route::get('/ins004', Ins004::class)->name('ins004'); //Por004
    Route::get('/ins005', Ins005::class)->name('ins005'); //Por005
    Route::get('/ins006', Ins006::class)->name('ins006'); //Por006

    Route::get('/weekreport', WeekReport::class)->name('weekreport'); //Ryu

    Route::get('/dailyreport/{id}', DailyReports::class)->name('dailyreport'); //Ryu2

    Route::get('/report', Report::class)->name('report'); //Ryu4


    Route::get('/document', Document::class)->name('document'); //Lek

    Route::get('/informations', InformationS::class)->name('informations'); //Leo
    Route::get('/list-teachers', ListTeachers::class)->name('list-teachers'); //Leo
    Route::get('/list-students', ListStudents::class)->name('list-students'); //Leo
    Route::get('/profile-student', ProfileStudent::class)->name('profile-student'); //Leo
    Route::get('/profile-students/{id}', ProfileStudentS::class)->name('profile-students'); //Leo
    Route::get('/followreport', FollowReport::class)->name('followreport'); //Ryu3
    Route::get('/follow/{id}', Follow::class)->name('follow'); //Ryu3

    Route::group(['namespace' => 'App\Http\Livewire\Companys', 'prefix' => 'manage-companys'], function () {
        Route::get("/", ManageCompanys::class)->name('manage-companys');
    });

    Route::group(['namespace' => 'App\Http\Livewire\Students', 'prefix' => 'manage-students'], function () {
        Route::get("/", ManageStudents::class)->name('manage-students');
        Route::get("/import-student", ImportStudents::class)->name('import-student');
    });

    Route::group(['namespace' => 'App\Http\Livewire\StudentsInformation', 'prefix' => 'student-information'], function () {
        Route::get("/", Students_Information::class)->name('student-information');
        // Route::get('/edit{id}', 'StudentsInformation@edit')->name('student-information');
    });

    // Route::group(['namespace' => 'App\Http\Livewire\informations', 'prefix' => 'informations'], function () {
    //     Route::get("/{id}", InformationS::class)->name('informations');
    //     // Route::get('/edit{id}', 'StudentsInformation@edit')->name('student-information');
    // });
    // Route::get('/edit{id}', 'StudentsInformation@edit')->name('student-information');
    // Route::get('/student-information/{id}', StudentsInformation::class)->name('student-information'); //Leo

    // Route::group(['namespace' => 'App\Http\Livewire\Documents', 'prefix' => 'document'], function () {
    //     Route::get("/", Document::class)->name('document');
    // });
    // Route::group(['namespace' => 'App\Http\Livewire\Documents'], function () {
    //     Route::get("/", Document::class)->name('document');
    // });

    Route::group(['namespace' => 'App\Http\Livewire\Teachers', 'prefix' => 'manage-teachers'], function () {
        Route::get("/", ManageTeachers::class)->name('manage-teachers');
        Route::get("/import-teacher", ImportTeachers::class)->name('import-teacher');
    });

    // Route::get('/students-information', StudentsInformation::class, 'createproject')->name('StudentsInformation.createproject');
    // Route::get('/manage-students', ManageStudents::class)->name('manage-students'); //Yee
    // Route::get('/manage-teachers', ManageTeachers::class)->name('manage-teachers'); //Yee
    // Route::get('/manage-companys', ManageCompanys::class)->name('manage-companys'); //Yee
    Route::get('/students-companys', StudentsCompanys::class)->name('students-companys'); //Bank
    Route::get('/students-teachers', StudentsTeachers::class)->name('students-teachers'); //Bank


    //  Route::get('/students-information', StudentsInformation::class)->name('students-information');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
});