<?php

use App\Http\Controllers\ChatController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('welcome2', function () {
    return view('welcome2');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('chatroom', [ChatController::class, 'index'])->name('chatroom');
    Route::get('get-online-users', [ChatController::class, 'getOnlineUsers'])->name('get-online-users');
    Route::post('update-online-status', [ChatController::class, 'updateOnlineStatus'])->name('update-online-status');
    Route::post('show-user-chat', [ChatController::class, 'showUserChat'])->name('show-user-chat');
    Route::post('load-old-chats', [ChatController::class, 'loadOldChats'])->name('load-old-chats');

    Route::post('store-message', [ChatController::class, 'storeMessage'])->name('store-message');
    Route::post('show-receiver-message', [ChatController::class, 'showReceiverMessage'])->name('show-receiver-message');

    Route::get('reset-chat-screen', [ChatController::class, 'resetChatScreen'])->name('reset-chat-screen');
});

require __DIR__.'/auth.php';
