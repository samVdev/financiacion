<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthMenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\boardsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CondominiumController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\EarningsController;
use App\Http\Controllers\ElevatorsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StaticsController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProvisionsController;
use App\Http\Controllers\ReceiptsController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TypeEarningController;

Route::post('/sanctum/token', TokenController::class);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('users')->group(function () {
        Route::get('/auth', AuthController::class);
        Route::get('/show', [AuthController::class, 'show']);
        Route::put('/update/{id}', [AuthController::class, 'edit']);
        Route::get('/auth-menu', AuthMenuController::class);
    });

    // only Admin or superAdmin
    Route::middleware(['admin'])->group(function () {

        Route::get('/counted', [StaticsController::class, 'index']);

        Route::prefix('users')->group(function () {
            Route::get('/{uuid}', [UserController::class, 'show']);
            Route::get('/', [UserController::class, 'index']);
            Route::post('/', [UserController::class, 'store']);
            Route::post('/{uuid}', [UserController::class, 'update']);
            Route::delete('/{uuid}', [UserController::class, 'destroy']);
            Route::post('/auth/avatar', [AvatarController::class, 'store']);
        });

        Route::prefix('clients')->group(function () {
            Route::get('/{uuid}', [ClientController::class, 'show']);
            Route::get('/', [ClientController::class, 'index']);
            Route::post('/', [ClientController::class, 'store']);
            Route::post('/{uuid}', [ClientController::class, 'update']);
            Route::delete('/{uuid}', [ClientController::class, 'destroy']);
        });

        Route::prefix('menus')->group(function () {
            Route::get('/', [MenuController::class, 'index']);
            Route::get('/children/{menuId}', [MenuController::class, 'children']);
            Route::post('/', [MenuController::class, 'store']);
            Route::put('/{menu}', [MenuController::class, 'update']);
            //Route::delete('/{id}', [MenuController::class,'destroy']);
        });

        Route::prefix('roles')->group(function () {
            Route::get('/helperTables', fn() => response()->json([
                "roles" => \App\Models\Role::select('id', 'name')->get()
            ], 200));
            Route::get('/{role}', [RoleController::class, 'show']);
            Route::get('/', [RoleController::class, 'index']);
            Route::post('/', [RoleController::class, 'store']);
            Route::put('/{role}', [RoleController::class, 'update']);
            Route::delete('/{id}', [RoleController::class, 'destroy']);
        });

        Route::prefix('statics')->group(function () {
            Route::get('/admin/counted', [StaticsController::class, 'index']);
        });

    });
});

Route::prefix('error')->group(function () {
    Route::get('/not-auth', function () {
        abort(403, 'This action is not authorized.');
    });

    Route::get('/not-found', function () {
        abort(404, 'Page not found.');
    });

    Route::get('/', function () {
        abort(500, 'Something went wrong');
    });
    Route::get('/custom', function () {
        throw new \App\Exceptions\CustomException('Error: Levi Strauss & CO.', 501);
    });
});
