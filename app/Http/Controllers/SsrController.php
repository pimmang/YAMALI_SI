<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SsrController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->hasRole("ssr")) {
            abort(403, 'Unauthorized action.');
        }
        $status = 'ssr';
        return view("SSR.ssr", compact('status'));
    }
}
