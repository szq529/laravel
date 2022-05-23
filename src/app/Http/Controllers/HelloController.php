<?php

namespace App\Http\Controllers;

// use Facade\FlareClient\Http\Response;

use Illuminate\Http\Request;
// use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        return view('hello.index');
    }
    // {
    //     $data = [
    //         ['name' => '山田', 'email' => 'a'],
    //         ['name' => '田中', 'email' => 'b'],
    //         ['name' => 'スズキ', 'email' => 'c'],
    //         // 'one', 'tow', 'tree', 'for',
    //     ];
    //     return view('hello.index', ['data' => $data]);
    // }

    // public function post(Request $request)
    // {
    //     $msg = $request->msg;
    //     // $data = [

    //     // ];
    //     return view('hello.index', ['msg' => $request->msg,]);
    // }
    // {
    //     $data = [
    //         'msg' => 'コントローラーからの',
    //         'id' => $request->id
    //     ];
    //     return view('hello.index', $data);
    // }
    //
    // public function index(Response $response)
    // {
    //     return $response;
    // }

    // シングルアクション
    // public function __invoke()
    // {
    //     return <<<EOF
    //         <p>シングルアクション</p>
    //         EOF;
    // }

    // public function index(Request $request)
    // {
    //     return view('Hello',compact('request'));
    // global $head, $style, $body, $end;

    // $html = $head
    //     . tag('title', 'Hello/Index')
    //     . $style
    //     . $body
    //     . tag('h1', 'Index')
    //     . tag('p', 'this is Index page')
    //     . '<a href="/hello/other">go to <b>other</b> page</a>'
    //     . $end;
    // return $html;
}
    // $response->setContent();
    // return $response;
    // other
    // public function other()
    // {
    //     return view('Hello/Index');
    //     global $head, $style, $body, $end;
    //     $html = $head
    //         . tag('title', 'Hello/other')
    //         . $style
    //         . $body
    //         . tag('h1', 'other')
    //         . tag('p', 'this is other page')
    //         . '<a href="/hello">go to <b>index</b> page</a>'
    //         . $end;
    //     return $html;
    // }
// }
// function tag($tag, $txt)
// {
// }
