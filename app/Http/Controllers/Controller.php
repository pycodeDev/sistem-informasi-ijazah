<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Notifications\TelegramNotification;
use Illuminate\Support\Facades\Notification;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function Tes(){
        Notification::send("082285118933", new TelegramNotification());
    }
}

