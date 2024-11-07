<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::get( '/products', [ProductController::class, 'index'] )->name( 'products.index' ); // GET /products: List all products
Route::get( '/products/create', [ProductController::class, 'create'] )->name( 'products.create' ); // GET /products/create: Show the form to create a new product
Route::post( '/products', [ProductController::class, 'store'] )->name( 'products.store' ); // POST /products: Store a new product
Route::get( '/products/{id}', [ProductController::class, 'show'] )->name( 'products.show' ); // GET /products/{id}: Show a specific product
Route::get( '/products/{id}/edit', [ProductController::class, 'edit'] )->name( 'products.edit' ); // GET /products/{id}/edit: Show the form to edit a product
Route::put( '/products/{id}', [ProductController::class, 'update'] )->name( 'products.update' ); // PUT /products/{id}: Update a product
Route::delete( '/products/{id}', [ProductController::class, 'delete'] )->name( 'products.destroy' ); // DELETE /products/{id}: Delete a product
