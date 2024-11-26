<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page1()
    {
        $user = auth()->user();
        return view('page1')->with('user', $user);
    }

}
