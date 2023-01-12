<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    function index()
    {
        return view('inbox.index');
    }
}
