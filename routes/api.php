<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\EmployeController;
use App\Http\Controllers\Api\DependentController;
use App\Http\Controllers\Api\TransportController;
use App\Http\Controllers\Api\CompanyExamsController;
use App\Http\Controllers\Api\EmployeExamsController;
use App\Http\Controllers\Api\JobFunctionsController;
use App\Http\Controllers\Api\EmployeDependentsController;
use App\Http\Controllers\Api\JobFunctionsEmployesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('companies', CompanyController::class);

        // Company Exams
        Route::get('/companies/{company}/exams', [
            CompanyExamsController::class,
            'index',
        ])->name('companies.exams.index');
        Route::post('/companies/{company}/exams', [
            CompanyExamsController::class,
            'store',
        ])->name('companies.exams.store');

        Route::apiResource('employes', EmployeController::class);

        // Employe Exams
        Route::get('/employes/{employe}/exams', [
            EmployeExamsController::class,
            'index',
        ])->name('employes.exams.index');
        Route::post('/employes/{employe}/exams', [
            EmployeExamsController::class,
            'store',
        ])->name('employes.exams.store');

        // Employe Dependents
        Route::get('/employes/{employe}/dependents', [
            EmployeDependentsController::class,
            'index',
        ])->name('employes.dependents.index');
        Route::post('/employes/{employe}/dependents', [
            EmployeDependentsController::class,
            'store',
        ])->name('employes.dependents.store');

        Route::apiResource('dependents', DependentController::class);

        Route::apiResource('all-job-functions', JobFunctionsController::class);

        // JobFunctions Employes
        Route::get('/all-job-functions/{jobFunctions}/employes', [
            JobFunctionsEmployesController::class,
            'index',
        ])->name('all-job-functions.employes.index');
        Route::post('/all-job-functions/{jobFunctions}/employes', [
            JobFunctionsEmployesController::class,
            'store',
        ])->name('all-job-functions.employes.store');

        Route::apiResource('exams', ExamController::class);

        Route::apiResource('transports', TransportController::class);
    });
