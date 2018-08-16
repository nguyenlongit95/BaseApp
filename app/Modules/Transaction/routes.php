<?php

$namespace = 'App\Modules\Transaction\Controllers';

$as = config('backend.backendRoute');

Route::group(['middleware' => ['web'], 'module'=>'Transaction', 'namespace' => $namespace], function () {
    Route::post('make-transaction',['as'=>'make-transaction', 'uses'=>'TransactionController@makeTransaction']);
});


Route::group(['prefix' => $as, 'middleware' => ['web','role:BACKEND'], 'module'=>'Transaction', 'namespace' => $namespace], function () {

	Route::get('transaction','TransactionController@index');
	Route::get('transaction-result','TransactionController@transactionResponse');


});
