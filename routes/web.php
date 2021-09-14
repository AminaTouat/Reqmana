<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetsController;
use App\Http\Controllers\UseCasesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExigencesController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\requirementsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
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
    Route::get('inv', [UserController::class, 'InvUser'])->name('user.inv');
    Route::get('/accept/{id}', [UserController::class, 'Accept'])->name('users.accept');
    Route::get('/refuse/{id}', [UserController::class, 'Refuse'])->name('users.refuse');

    //Message
    Route::get('/message/{id}', [MessageController::class, 'index'])->name('users.message');
    Route::get('/message/{id}/{projet_id}', [MessageController::class, 'create'])->name('users.send');
    Route::post('/message/store', [MessageController::class, 'store'])->name('message.add');

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
    Route::get('/createe/{id}/{id_use}', [ExigencesController::class, 'createe'])->name('requirementsUse.add');
    Route::post('/store', [ExigencesController::class, 'store'])->name('requirements.store');
    Route::get('/edit/{id}', [ExigencesController::class, 'edit'])->name('requirements.edit');
    Route::get('/detail/{id}', [ExigencesController::class, 'detail'])->name('requirements.detail');
    Route::post('/update/{id}', [ExigencesController::class, 'update'])->name('requirements.update');
    Route::post('/valide/{id}', [ExigencesController::class, 'valide'])->name('requirements.valide');
    Route::get('/delete/{id}', [ExigencesController::class, 'destroy'])->name('requirements.delete');
    Route::get('/view/{id}/{id_exigence}', [LinksController::class, 'index'])->name('link.view');
    Route::get('/view/{id}/{id_exigence}', [LinksController::class, 'software'])->name('software.view');
    Route::post('/delete', [LinksController::class, 'destroy'])->name('link.delete');
    Route::post('/addnonfn', [LinksController::class, 'store'])->name('link.store');
});
Route::prefix('Softwarrequirements')->group(function(){
    Route::get('/view/{id}', [requirementsController::class, 'index'])->name('Srequirements.view');
    Route::get('/create/{id}', [requirementsController::class, 'create'])->name('Srequirements.add');
    Route::get('/createe/{id}/{id_userReq}', [requirementsController::class, 'createe'])->name('SrequirementsUser.add');
    Route::post('/store', [requirementsController::class, 'store'])->name('Srequirements.store');
    Route::get('/edit/{id}', [requirementsController::class, 'edit'])->name('Srequirements.edit');
    Route::get('/source/{id}/{id_exigence}', [requirementsController::class, 'source'])->name('Srequirements.source');
    Route::get('/detail/{id}', [requirementsController::class, 'detail'])->name('Srequirements.detail');
    Route::post('/update/{id}', [requirementsController::class, 'update'])->name('Srequirements.update');
    Route::post('/valide/{id}', [requirementsController::class, 'valide'])->name('Srequirements.valide');
    Route::get('/delete/{id}', [requirementsController::class, 'destroy'])->name('Srequirements.delete');
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


