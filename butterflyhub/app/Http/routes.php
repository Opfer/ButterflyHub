<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('taxa', 'TaxonController@index');
Route::get('taxa/{id}', ['uses' => 'TaxonController@show']);
Route::get('taxa/sort/{criteria}', ['uses' => 'TaxonController@sort']);
Route::get('taxa/{id}/edit', ['uses' => 'TaxonController@edit']);

Route::patch('taxa/update/{id}', ['as' => 'taxa.update', 'uses' => 'TaxonController@update']);

Route::get('categories', 'TaxonCategoryController@index');
Route::get('categories/{id}', ['uses' => 'TaxonCategoryController@show']);
Route::get('categories/{id}/edit', ['uses' => 'TaxonCategoryController@edit']);
Route::patch('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'TaxonCategoryController@update']);

Route::get('/getTaxonEditAutocomplete', ['uses' => 'TaxonController@searchTaxonByName']);
Route::get('/getTaxonEditOrder', ['uses' => 'TaxonController@getTaxonEditOrder']);

Route::get('/test', 'TaxonController@reorderTaxaConsecutiveNumbers');


Route::get('/test3/{id}', 'TaxonController@destroy');
Route::get('/test4/{id}', 'TaxonController@restore');
