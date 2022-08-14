<?php

use App\Http\Controllers\DashboardSuvey;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KinerjaController;
use App\Http\Controllers\ManageQuestionController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewSurveyController;
use App\Http\Controllers\SurveyReportController;
use App\Http\Controllers\UserSurveyController;
use App\Models\User;
use Illuminate\Support\Facades\{Route, Auth};
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('land-page', [ReviewSurveyController::class, 'index'])->name('land-page');
Route::get('land-page/{item:slug}', [ReviewSurveyController::class, 'create']);
Route::get('dashboard/', [DashboardSuvey::class, 'index'])->name('dashboard')->middleware('admin');

Route::get('tes', [PagesController::class, 'store'])->name('tes');
Route::post('dashboard/survey/test', [ReviewSurveyController::class, 'store'])->name('tes1');

Route::get('survey-list', [DashboardSuvey::class, 'index2'])->name('survey-list');
Route::get('survey-list-report', [SurveyReportController::class, 'index'])->name('survey-list-report');

Route::get('show_report_user/{id}', [UserSurveyController::class, 'show2'])->name('show-report-user');

Route::get('tipe_soals/check_slug', [DashboardSuvey::class, 'check_slug'])->name('tipe_soals.check_slug');
Route::get('contoh', [PostController::class, 'index'])->name('contoh');
Route::get('/table/dashboardsuvey', [DashboardSuvey::class, 'dataTable'])->name('table.dashboardsuvey');

Route::get('/dashboard/user',[UserSurveyController::class, 'dashboard'])->name('dashboard-user')->middleware('user');
Route::get('/dashboard/user/print/{id}',[UserSurveyController::class, 'print'])->name('print-user')->middleware('admin');

Route::resource('/user', UserSurveyController::class)->middleware('admin');
Route::resource('/surveyreport',SurveyReportController::class)->middleware('auth');
Route::resource('/landingpage',ReviewSurveyController::class)->middleware('auth');
Route::resource('/dashboard/suvey',DashboardSuvey::class)->middleware('auth');
Route::resource('/dashboard/managequestion',ManageQuestionController::class)->middleware('auth');
Route::resource('/dashboard/kinerja', KinerjaController::class)->middleware('auth');

Route::get('jwb/{id}',[ManageQuestionController::class, 'deleteJawaban'])->name('deleteJwb');
Route::post('addjwb',[ManageQuestionController::class, 'addJawaban'])->name('addJwb');
Route::post('editsoal', [ManageQuestionController::class, 'editSoal'])->name('editSoal');

