<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\AcountStatusNotification;

class BaseController extends Controller
{
    
    public function sendNotificationToUser($user){
        //$user->notify(new AcountStatusNotification($user));
    }
}
