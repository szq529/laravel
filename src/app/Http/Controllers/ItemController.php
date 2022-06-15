<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // 全件取得
    public function index(Request $requiest)
    {
        $items = Item::all();
        return view('items.index', ['items' => $items]);
    }

    // public function getData()
    // {
    //     //     $items = Item::all();
    //     return $this->id . ':' . $this->name . '(' . $this->age  . ')';
    // }
    public function find(Request $request)
    {
        return view('items.find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = Item::find($request->input);
        $param = ['input' => $request->input, 'item' => $item];
        // dd($param);
        return view('items.find', $param);
    }
}
