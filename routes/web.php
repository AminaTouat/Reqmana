<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetsController;
use App\Http\Controllers\UseCasesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExigencesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
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
    if (!auth()->check()) {
        return view('auth/login');
    }
    return route('dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [ProjetsController::class, 'index'])->name('dashboard');
Route::get('/logout', [AdminController::class, 'Logout'])->name('user.logout');

Route::group(['middleware' => 'auth'],function(){
Route::prefix('user')->group(function(){
    Route::get('/view/{id}', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/add/{id}', [UserController::class, 'UserAdd'])->name('users.add');
    Route::get('/add/exist/{id}', [UserController::class, 'UserExistAdd'])->name('users.exist.add');
    Route::post('/store/{id}', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}/{projet_id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}/{projet_id}', [UserController::class, 'UserDelete'])->name('users.delete');
    Route::get('getuser/{id}', [UserController::class, 'GetUser'])->name('user.getuser');
    Route::post('user/projet/store/{id}', [UserController::class, 'UserprojetStore'])->name('user.projet.store');

    //Route Projet
    // Route::get('/projet',  [ProjetsController::class, 'index'])->name('index');
    Route::get('/projet/new', [ProjetsController::class, 'nouveauProjet'])->name('project.new');
    Route::post('/projet/new', [ProjetsController::class, 'createProjet'])->name('createProjet');
    Route::get('/project/{id}', [projetsController::class, 'currentProject'])->name('project.current');
});

//Exigences Route
Route::prefix('requirements')->group(function(){
    Route::get('/view/{id}', [ExigencesController::class, 'index'])->name('requirements.view');
    Route::get('/create/{id}', [ExigencesController::class, 'create'])->name('requirements.add');
    Route::post('/store', [ExigencesController::class, 'store'])->name('requirements.store');
    Route::get('/edit/{id}', [ExigencesController::class, 'edit'])->name('requirements.edit');
    Route::get('/detail/{id}', [ExigencesController::class, 'detail'])->name('requirements.detail');
    Route::post('/update/{id}', [ExigencesController::class, 'update'])->name('requirements.update');
    Route::get('/delete/{id}', [ExigencesController::class, 'destroy'])->name('requirements.delete');
});

// User Profile and Change Password
Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
    });


    

    Route::get('/AddUseCase/{id}', [UseCasesController::class, 'index'])->name('add.useCase');
    Route::post('/create/{id}', [UseCasesController::class, 'create'])->name('create.useCase');
    Route::get('/delete/{id}', [UseCasesController::class, 'destroy'])->name('useCase.delete');



    // Route::get('/comment', [CommentController::class, 'index'])->name('comment.view');
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
});


