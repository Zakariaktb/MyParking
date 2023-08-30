<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
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
    // $url = 'http://34.212.189.94/';

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
Route::resource('/payment', PaymentController::class);
Route::resource('/transaction', TransactionController::class);
// Route::get('payment', [PaymentController::class, 'show']);

Route::get('checkout',function () {
    return view('Checkout');
});
Route::get('/exit', function () {
    $url = 'http://127.0.0.1:8000/checkout';
    // $url = 'http://34.212.189.94/';

    // Set the width and height of the QR code (in pixels)
    $width = 200;
    $height = 200;

    $qrCode = QrCode::size($width, $height)->generate($url);

    return view('qr_code', ['qrCode' => $qrCode]);
});
Route::get('/success.html', function () {
    return view('success');
});
Route::get('/cancel.html', function () {
    return view('cancel');
});
Route::post('/checkout', [StripePaymentController::class, 'createCheckoutSession']);
Route::post('/stripe/webhook', [StripeWebhookController::class,'handleWebhook']);

