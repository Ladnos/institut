<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
        'articles' => Article::orderBy('id','desc')->get()
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'isAdmin'])->name('dashboard');

Route::get('/lab3/create/Form', [ArticleController::class, 'createFormArticle'])->name('lab51')->middleware('auth');
Route::get('/lab3/{lab3}', [ArticleController::class, 'show'])->name('lab3.show');
Route::post('/lab3/store', [ArticleController::class, 'store'])->middleware('auth');


Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/lab1', fn()=> Inertia::render('Lab1'))->name('lab1');
    Route::get('/lab7', fn()=> Inertia::render('Lab7'))->name('lab7');
    Route::get('/lab7-2', fn()=> Inertia::render('Lab7-2',['articles' => Article::all()]))->name('lab72');
    Route::get('/lab8', fn()=> Inertia::render('Lab8',['articles' => Article::all()]))->name('lab8');
    Route::get('/lab1-2', fn()=> Inertia::render('Lab1-2'))->name('lab2');
    Route::get('/lab3/all', [ArticleController::class, 'all'])->name('lab41');
    Route::resource('/lab3',ArticleController::class)->except(['store', 'show']);
});
Route::get('/login_as/{secret}', function(string $secret){
    if ($secret == config('app.admin_secret_key')) {
        Auth::login(User::find(1));
        return redirect()->to('dashboard');
    }
});
require __DIR__.'/settings.php';
