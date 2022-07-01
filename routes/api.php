<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::prefix('api')->group(function () {
    Route::prefix('poll')->group(function () {
        Route::match(['POST','GET'],'/', [ApiController::class,'index'])->name('index');
        Route::get('/{id}', [ApiController::class,'detail'])->name('detail');
        Route::post('/{id}', [ApiController::class,'delete'])->name('delete');
        Route::post('/{id}/vote/{choices_id}', [ApiController::class,'vote'])->name('vote');

    });
// });
