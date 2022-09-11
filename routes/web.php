<?php

use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
});

Route::get('/send-notification', function(){
    //$user= User::find(1);
       // $user->notify(new EmailNotification());
    //Notification::send($user, new EmailNotification());
    $users = User::all();
    foreach($users as $user){
        Notification::send($user, new EmailNotification('Developer , Polash Mahmud','e.arifulislam1793@gmail.com'));
    }


    return redirect()->back();
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
