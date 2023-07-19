<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    $url = 'http://127.0.0.1:8000/Home';

    // Set the width and height of the QR code (in pixels)
    $width = 200;
    $height = 200;

    $qrCode = QrCode::size($width, $height)->generate($url);

    return view('qr_code', ['qrCode' => $qrCode]);
});
Route::get('/Home',function () {
    return view('Home');
});

Route::resource('user', UserController::class);

