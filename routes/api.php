<?php
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('v1/produk/',[ProdukController::class,'index']);
Route::get('v1/produk/',[ProdukController::class,'save']);
Route::post('v1/produk/',[ProdukController::class,'findByID']);
Route::put('v1/produk/',[ProdukController::class,'showProduk']);
Route::delete('v1/produk/',[ProdukController::class,'editProduk']);
Route::put('v1/produk/',[ProdukController::class,'destroyProduk']);