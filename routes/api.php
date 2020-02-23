<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Quotation
Route::get('/quotation', 'QuotationController@fetchAllQuotation');
Route::post('/quotation', 'QuotationController@store');
Route::patch('/quotation/{quotation_id}', 'QuotationController@update');
Route::delete('/quotation/{quotation_id}', 'QuotationController@destroy');

//Receipt
Route::get('/receipt', 'ReceiptController@fetchAllReceipt');
Route::post('/receipt', 'ReceiptController@store');
Route::patch('/receipt/{receipt_id}', 'ReceiptController@update');
Route::delete('/receipt/{receipt_id}', 'ReceiptController@destroy');


//Invoice

Route::get('/invoice', 'InvoiceController@fetchAllInvoice');
Route::post('/invoice', 'InvoiceController@store');
Route::patch('/invoice/{invoice_id}', 'InvoiceController@update');
Route::delete('/invoice/{invoice_id}', 'InvoiceController@destroy');