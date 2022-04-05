<?php

use Illuminate\Support\Facades\Route;
use App\Notifications\EmailNotification;
use App\Notifications\TaskCompleted;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-notification', function(){
    // $user = User::find(1);
    //$user->notify(new EmailNotification());
    //Notification::Send($user, new EmailNotification());
    $users = User::all();
    foreach($users as $user){
        Notification::Send($user, new EmailNotification('Yeasin', 'Web Journey'));
    }
    return redirect()->back();
});

Route::get('/database-notification', function(){
    
    $users = User::all();
    foreach($users as $user){
        Notification::Send($user, new TaskCompleted());
    }
    return "notication send";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
