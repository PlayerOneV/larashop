<?php

use Illuminate\Http\Request;
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
//Ruta principal
Route::get('/', function () {
    return view('welcome');
});
//Ruta para obtener todos los productos
Route::get('products', function () {
    return 'this is the list of products';
})->name('products.index');
//Ruta para mostrar el form para crear un producto
Route::get('products/create', function () {
    return 'this is the list of products';
})->name('products.create');
//Ruta para enviar el form y crear un producto
Route::post('products', function () {
    return 'this is the post url';
})->name('products.store');
//Ruta para mostrar un producto especifico
Route::get('products/{product}', function ($product) {
    return "showing product with id {$product}";
})->name('products.show');
//Ruta para mostrar el form para editar un producto especifico
Route::get('products/{product}/edit', function ($product) {
    return "showing product with id {$product} to edit it";
})->name('products.edit');
//Ruta para enviar la información para editar un producto especifico
Route::match(['put', 'patch'], 'products/{product}', function ($product) {
    return "Getting the data to updating the product with id {$product}";
})->name('products.update');
//Ruta para eliminar un producto especifico
Route::delete('products/{product}', function ($product) {
    return "Deleting the product with id {$product}";
})->name('products.destroy');
