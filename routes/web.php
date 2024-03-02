<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationMessageController;
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

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::post('/send-notification-message', [NotificationMessageController::class, 'SendNotificationMessages'])->name("send.notification.messages");
