<?php

namespace App\Http\Controllers;

use App\Models\Human;
use Illuminate\Http\Request;

class HumanController extends Controller
{
    //
    public function index(Request $request)
    {
        $humans = Human::all();
        return view('dbview.find', ['humans' => $humans]);
    }
}
