<?php

use App\Events\sendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $data = [
        'name'  => 'arifin',
        'kelas' => 'XII'
    ];
    return view('tes_view', [
        'data'  => $data
    ]);
});

Route::get('brodcast', function () {
    $data = [
        'name'  => 'azriel rafiq',
        'kelas' => 'XII'
    ];
    sendMessage::dispatch($data);
});
