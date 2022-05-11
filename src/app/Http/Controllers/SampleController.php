<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index($noname, $pass = '')
    {
        // コントローラーからの設定された引数を受け取り表示する
        return view('sample', compact('noname', 'pass'));
    }
    // public function index()
    // {
    //     return view('sample');
    // }
}
