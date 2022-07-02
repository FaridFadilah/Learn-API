<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| Route::get("/products", fn() => view("api"));
| Route::post("/products", function(Request $request){
|
| });
| Route::get("/test", fn(Request $request) => "Farid Fadillah ");
|
|
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::middleware("auth:api")->prefix("v1")->group(function(){
    Route::get("/user", function(Request $request){
        return $request->user();
    });

    //Authors/{Author}
    //For one specific author

    Route::apiResource("/books", BooksController::class);
    Route::apiResource("/authors", AuthorsController::class);

    // Route::get("/authors/{author}", [AuthorsController::class, "show"]);
    // Route::get("/authors", [AuthorsController::class, "index"]);
});

// Book Belongs To an author
// User that created books 