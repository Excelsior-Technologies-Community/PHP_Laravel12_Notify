<?php

namespace App\Http\Controllers;

class TestNotifyController extends Controller
{
    public function index()
    {
        notify()->success('This is a real banner notification');

        return redirect()->back();
    }
}
