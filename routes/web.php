<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GuaranteeCategoryController;
use App\Http\Controllers\GuaranteeController;
use App\Http\Controllers\GuaranteeFileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectFileController;
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

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/projects', [ProjectController::class, "index"])->name("projects");
Route::get('/guarantees', [GuaranteeController::class, "index"])->name("guarantees");
Route::get('/contact', [ContactController::class, "index"])->name("contact");

Route::prefix('project-categories')->group(function () {
    Route::get("/", [ProjectCategoryController::class, "index"])->name("project-categories");
    Route::get("/{id}", [ProjectCategoryController::class, "show"])->name("project-categories.show");
    Route::middleware("auth")->group(function () {
        Route::post("/", [ProjectCategoryController::class, "store"])->name("project-categories.store");
        Route::put("/{id}", [ProjectCategoryController::class, "update"])->name("project-categories.update");
        Route::delete("/{id}", [ProjectCategoryController::class, "destroy"])->name("project-categories.destroy");
    });
});

Route::prefix('guarantee-categories')->group(function () {
    Route::get("/", [GuaranteeCategoryController::class, "index"])->name("guarantee-categories");
    Route::get("/{id}", [GuaranteeCategoryController::class, "show"])->name("guarantee-categories.show");
    Route::middleware("auth")->group(function () {
        Route::post("/", [GuaranteeCategoryController::class, "store"])->name("guarantee-categories.store");
        Route::put("/{id}", [GuaranteeCategoryController::class, "update"])->name("guarantee-categories.update");
        Route::delete("/{id}", [GuaranteeCategoryController::class, "destroy"])->name("guarantee-categories.destroy");
    });
});

Route::middleware("auth")->group(function () {
    Route::prefix('projects-back')->group(function () {
        Route::get("/{id}", [ProjectController::class, "show"])->name("projects-back.show");
        Route::post("/", [ProjectController::class, "store"])->name("projects-back.store");
        Route::put("/{id}", [ProjectController::class, "update"])->name("projects-back.update");
        Route::delete("/{id}", [ProjectController::class, "destroy"])->name("projects-back.destroy");
    });

    Route::prefix('guarantees-back')->group(function () {
        Route::get("/{id}", [GuaranteeController::class, "show"])->name("guarantees-back.show");
        Route::post("/", [GuaranteeController::class, "store"])->name("guarantees-back.store");
        Route::put("/{id}", [GuaranteeController::class, "update"])->name("guarantees-back.update");
        Route::delete("/{id}", [GuaranteeController::class, "destroy"])->name("guarantees-back.destroy");
    });

    Route::prefix('project-files')->group(function () {
        Route::get("/", [ProjectFileController::class, "index"])->name("project-files");
        Route::get("/{id}", [ProjectFileController::class, "show"])->name("project-files.show");
        Route::post("/", [ProjectFileController::class, "store"])->name("project-files.store");
        Route::put("/{id}", [ProjectFileController::class, "update"])->name("project-files.update");
        Route::delete("/{id}", [ProjectFileController::class, "destroy"])->name("project-files.destroy");
    });

    Route::prefix('guarantee-files')->group(function () {
        Route::get("/", [GuaranteeFileController::class, "index"])->name("guarantee-files");
        Route::get("/{id}", [GuaranteeFileController::class, "show"])->name("guarantee-files.show");
        Route::post("/", [GuaranteeFileController::class, "store"])->name("guarantee-files.store");
        Route::put("/{id}", [GuaranteeFileController::class, "update"])->name("guarantee-files.update");
        Route::delete("/{id}", [GuaranteeFileController::class, "destroy"])->name("guarantee-files.destroy");
    });
});

require __DIR__ . '/auth.php';
