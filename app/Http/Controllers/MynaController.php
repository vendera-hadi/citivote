<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MynaController extends Controller
{
    public function index()
    {
        $data = [];
        return view('myna.upload', $data);
    }
}
