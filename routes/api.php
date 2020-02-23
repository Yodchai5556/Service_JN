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
// Driver
Route::get('driver','DriverController@show');
Route::post('driver','DriverController@store');
Route::patch('driver/{driver_id}','DriverController@update');
Route::delete('driver/{driver_id}','DriverController@destroy');

// Income
Route::get('income','IncomeController@show');
Route::post('income','IncomeController@store');
Route::patch('income/{income_id}','IncomeController@update');
Route::delete('income/{income_id}','IncomeController@destroy');

// Income History
Route::get('income_history','IncomeHistoryController@show');
Route::post('income_history','IncomeHistoryController@store');
Route::patch('income_history/{income_history_id}','IncomeHistoryController@update');
Route::delete('income_history/{income_history_id}','IncomeHistoryController@destroy');

// Income Month
Route::get('income_month','IncomeMonthController@show');
Route::post('income_month','IncomeMonthController@store');
Route::patch('income_month/{income_month_id}','IncomeMonthController@update');
Route::delete('income_month/{income_month_id}','IncomeMonthController@destroy');

// Tax
Route::get('tax','TaxController@show');
Route::post('tax','TaxController@store');
Route::patch('tax/{tax_id}','TaxController@update');
Route::delete('tax/{tax_id}','TaxController@destroy');
