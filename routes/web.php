<?php

use App\Http\Controllers\ControllerPergunta;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUser;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::check()){
        return redirect()->route('inicio');
    }else{
        return view('login');
        // return redirect()->route('inicio');
    }
})->name('index');

Route::get('/login',[ControllerUser::class, 'login'])->name('login');
Route::get('/criar/conta',[ControllerUser::class, 'criar_conta'])->name('criar.conta');
Route::post('/add/user',[ControllerUser::class,'adduser'])->name('adduser');

Route::post('/user/entrar',[ControllerUser::class,'entrar'])->name('entrar');



Route::middleware(['auth'])->group(function(){
    Route::prefix('administrador/angelo/mwadiavita/hd/huns/imetro/djamila')->group(function(){
        Route::get('/jogo',[ControllerPergunta::class,'jogo'])->name('jogo');
        Route::get('layout',[ControllerPergunta::class,'layout'])->name('layout');
        Route::get('perguntas',[ControllerPergunta::class,'index'])->name('pergunta.index');
        Route::post('pergunta/save',[ControllerPergunta::class,'Salvar_Pergunta'])->name('Salvar_Pergunta');
        Route::get('pergunta/editar/{id}',[ControllerPergunta::class,'Edit_pergunta'])->name('Edit_pergunta');
        Route::post('pergunta/salvar/edit/{id}',[ControllerPergunta::class,'salvar_edit'])->name('salvar_edit');

    });
    Route::post('user/logout',[ControllerUser::class,'logout'])->name('logout');
    Route::post('/jogo/responder',[ControllerPergunta::class,'responder'])->name('responder');
    Route::get('/jogo/inicio',[ControllerPergunta::class,'inicio'])->name('inicio');
});
