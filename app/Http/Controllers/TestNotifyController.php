<?php

namespace App\Http\Controllers;

class TestNotifyController extends Controller
{
    public function index()
    {
        notify()->success('Notify is working perfectly 🚀');

        return redirect()->back();
    }
}