<?php
    use Illuminate\Support\Facades\Route;   
    use App\Http\Controllers\Api\HomeController;
    use App\Http\Controllers\Api\CartItemController;
    use App\Http\Controllers\Api\AuthController;
    use App\Http\Controllers\Api\SellerProductController;

    Route::prefix('home')->group(function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/banners', [HomeController::class, 'banners']);
        Route::get('/categories', [HomeController::class, 'categories']);
        Route::get('/flash-sale', [HomeController::class, 'flashSale']);
        Route::get('/top-selling', [HomeController::class, 'topSelling']);
        Route::get('/trending', [HomeController::class, 'trending']);
        Route::get('/recommend-by-category', [HomeController::class, 'recommendByCategory']);
    });

    Route::middleware('auth:sanctum')->prefix('cart')->group(function () {
        Route::post('/add', [CartItemController::class, 'add']);
        Route::delete('/remove', [CartItemController::class, 'remove']);
    });

    Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/seller/products', [SellerProductController::class, 'store']);
    Route::put('/seller/products/{id}', [SellerProductController::class, 'update']);
    Route::delete('/seller/products/{id}', [SellerProductController::class, 'destroy']);
});


    Route::post('/login', [AuthController::class, 'login']);
?>