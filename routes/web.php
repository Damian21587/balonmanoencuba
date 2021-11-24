<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/optimize-all', function () {
    Artisan::call('optimize:clear');
    dd("All Caches cleared successfully!");
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::get('/login',[App\Http\Controllers\BalonmanoEnCubaController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\BalonmanoEnCubaController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\BalonmanoEnCubaController::class, 'logout'])->name('logout');

Route::get('lang/{lang}', [\App\Http\Controllers\LanguageController::class,'switchLang'])->name('lang.switch');

Route::prefix('home')->namespace('Home')->name('home.')->group(function () {
    Route::get('/noticias', [\App\Http\Controllers\Home\NewController::class,'index'])->name('noticias');
    Route::get('/quienes-somos', [\App\Http\Controllers\Home\AboutController::class,'index'])->name('quienes-somos');
    Route::get('/jugador/{jugador}', [\App\Http\Controllers\Home\PlayerController::class,'detallesJugador'])->name('detalles-jugador');
    Route::get('/noticia/{noticia}', [\App\Http\Controllers\Home\NewController::class,'detallesNoticia'])->name('detalles-noticias');
    Route::post('/mensaje-conctacto', [\App\Http\Controllers\Home\ContactMessageController::class,'sendMessage'])->name('mensaje-contacto');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class,'index'])->name('index');
    Route::name('manager.')->group(function () {
        Route::resource('/usuarios', \App\Http\Controllers\Admin\UserController::class,
            ['except' => ['show']]);
        Route::get('/usuarios/password-reset/{user}/edit',[App\Http\Controllers\Admin\UserController::class,'editPassword'])
            ->name('users.password-reset');
        Route::put('/usuarios/password-reset/{user}',[App\Http\Controllers\Admin\UserController::class,'updatePassword'])
            ->name('users.password-update');
        /*Route::get('/usuarios/perfil',[App\Http\Controllers\Admin\UserController::class,'perfilUsuario'])
            ->name('users.perfil');*/
        Route::resource('/roles', \App\Http\Controllers\Admin\RoleController::class,
            ['except' => ['show']]);
    });

    Route::name('nomenclator.')->group(function () {
        Route::resource('posiciones', App\Http\Controllers\Admin\PositionController::class,['except' => ['show']]);
        Route::resource('titulos', App\Http\Controllers\Admin\TitleController::class,['except' => ['show']]);
        Route::resource('provincias', App\Http\Controllers\Admin\ProvinceController::class,['except' => ['show']]);

    });

    Route::name('content.')->group(function () {
        Route::resource('jugadores', App\Http\Controllers\Admin\PlayerController::class,['except' => ['show']]);
        Route::resource('contactos', App\Http\Controllers\Admin\ContactController::class,['except' => ['show']]);
        Route::resource('quienes-somos', App\Http\Controllers\Admin\AboutController::class,['except' => ['show']]);
        Route::resource('noticias', App\Http\Controllers\Admin\NewController::class,['except' => ['show']]);
        Route::resource('redes-sociales', App\Http\Controllers\Admin\SocialNetworkController::class,['except' => ['show']]);
    });
});

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');





