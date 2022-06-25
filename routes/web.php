<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\DependentController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\JobFunctionsController;

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

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::get('getDocuments/{cnpj}', [CompanyController::class, 'getReceitaFederal'])->name('getDocuments');
        Route::resource('companies', CompanyController::class);
        Route::resource('employes', EmployeController::class);
        Route::resource('dependents', DependentController::class);
        Route::get('all-job-functions', [
            JobFunctionsController::class,
            'index',
        ])->name('all-job-functions.index');
        Route::post('all-job-functions', [
            JobFunctionsController::class,
            'store',
        ])->name('all-job-functions.store');
        Route::get('all-job-functions/create', [
            JobFunctionsController::class,
            'create',
        ])->name('all-job-functions.create');
        Route::get('all-job-functions/{jobFunctions}', [
            JobFunctionsController::class,
            'show',
        ])->name('all-job-functions.show');
        Route::get('all-job-functions/{jobFunctions}/edit', [
            JobFunctionsController::class,
            'edit',
        ])->name('all-job-functions.edit');
        Route::put('all-job-functions/{jobFunctions}', [
            JobFunctionsController::class,
            'update',
        ])->name('all-job-functions.update');
        Route::delete('all-job-functions/{jobFunctions}', [
            JobFunctionsController::class,
            'destroy',
        ])->name('all-job-functions.destroy');

        Route::resource('exams', ExamController::class);
        Route::resource('transports', TransportController::class);
    });
