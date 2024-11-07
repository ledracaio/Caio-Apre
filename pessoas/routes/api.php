<?php 

use Illuminate\Support\Facades\Route;

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::resource('pessoas', 'PessoaController');

?>