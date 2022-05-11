<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

function tag($tag, $txt)
{
}

class HelloController extends Controller
{
    public function index()
    {
        return view('Hello');
        //     global $head, $style, $body, $end;

        //     $html = $head
        //         // . tag('title', 'Hello/Index')
        //         . $style
        //         . $body
        //         // . tag('h1', 'Index')
        //         // . tag('p', 'this is Index page')
        //         // . '<a href="/hello/other">go to <b>other</b> page</a>'
        //         . $end;
        //     // return $html;
        // }
    }
    public function other()
    {
        // return view('Hello/Index');
        global $head, $style, $body, $end;

        $html = $head
            . tag('title', 'Hello/other')
            . $style
            . $body
            . tag('h1', 'other')
            . tag('p', 'this is other page')
            . '<a href="/hello">go to <b>index</b> page</a>'
            . $end;
        return $html;
    }
}
