<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\ClientAuthController;
use App\Http\Controllers\CareerApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogApiController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\AssetController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('blog/delete_featured_image/{BlogImage}', [BlogController::class, 'deleteImage'])->name('blog.deleteFeaturedImage');
Route::post('/webhook/blogs/create', [BlogApiController::class, 'createBlogWebhook'])
    ->withoutMiddleware('throttle:api');

Route::match(['get', 'post'], '/webhook/test', function () {
    return response()->json(['message' => 'Webhook test route works']);
});
Route::get('/career-details', [CareerApiController::class, 'getCareerDetails']);
// Route::post('career-update/{id}', [CareerApiController::class, 'updateCareerDetails']);
Route::middleware('throttle:100,1')->post('career-update/{id}', [CareerApiController::class, 'updateCareerDetails']);

Route::middleware(['auth:sanctum', 'ability:admin:read,client'])->group(function () {
    Route::get('/clients', [ClientController::class, 'index']);
    Route::get('/clients/{clientId}/data', [ClientController::class, 'dataByClient']);

    Route::post('/client/create', [ClientController::class, 'store']);              // create (admin only)
    Route::post('/client/edit/{clientId}', [ClientController::class, 'update']);

});


Route::prefix('admin')->group(function () {
    // Public route
    Route::post('login', [AdminAuthController::class, 'login'])->middleware('throttle:10,1');

    // Protected routes (require Sanctum token)
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AdminAuthController::class, 'logout']);
        Route::get('me', [AdminAuthController::class, 'me']);
    });
});

Route::prefix('client')->group(function () {
    // Public: client login
    Route::post('login', [ClientAuthController::class, 'login'])->middleware('throttle:20,1');

    // Protected: only client tokens (ability-based)
    Route::middleware(['auth:sanctum', 'abilities:client'])->group(function () {
        Route::get('me',    [ClientAuthController::class, 'me']);
        Route::post('logout', [ClientAuthController::class, 'logout']);
    });
});

Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'index']);
    Route::post('/', [EventController::class, 'store']);
    Route::get('{event}', [EventController::class, 'show']);
    Route::put('{event}', [EventController::class, 'update']);
    Route::delete('{event}', [EventController::class, 'destroy']);

    Route::post('{event}/assign', [EventController::class, 'assign']);          // { assigned_to }
    Route::post('{event}/status', [EventController::class, 'changeStatus']);    // { status, note? }

    Route::get('{event}/comments', [CommentController::class, 'indexForEvent']);
    Route::post('{event}/comments', [CommentController::class, 'storeForEvent']); // { author_type, body }

    Route::post('{event}/upload', [AssetController::class, 'upload']);          // multipart file
    Route::get('{event}/assets', [AssetController::class, 'index']);

    // Route::patch('/{event}/edit', [EventController::class, 'edit']);
    Route::post('/{event}/edit', [EventController::class, 'edit']);
});

Route::get('assets/{asset}/comments', [CommentController::class, 'indexForAsset']);
Route::post('assets/{asset}/comments', [CommentController::class, 'storeForAsset']); // { author_type, body }