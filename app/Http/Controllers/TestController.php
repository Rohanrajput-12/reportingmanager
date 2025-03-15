<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomService;
use App\Services\GetMessage;

class TestController extends Controller
{
    public function index(CustomService $customService)
    {
        return $customService->sayhello();
    }

    public function showMessage(GetMessageService $getMessage)
    {
        return $getMessage->sendmessage();
    }
}
