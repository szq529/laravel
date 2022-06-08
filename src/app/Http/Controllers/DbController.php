<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class DbController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->id)) {
            $param = ['id' => $request->id];
            $foo = DB::select('select * from human where id = :id', $param);
        } else {
            $foo = DB::select('select * from human');
        }
        // $foo = DB::select('select * from human');
        return view('dbview.db', ['foo' => $foo]);
    }

    public function add(Request $request)
    {
        return view('dbview.add');
    }

    // 新規作成、一覧へリダイレクト
    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert(
            'insert into
        human (name, mail, age)
        values(:name, :mail, :age)',
            $param
        );
        return redirect('db');
    }

    // データ取得、編集form
    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $foo = DB::select('SELECT * FROM human WHERE id = :id', $param);
        // dd($param);
        return view('dbview.edit', ['from' => $foo[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        // ddd($param);
        DB::update(
            'UPDATE human SET name = :name, mail = :mail, age = :age WHERE id = :id',
            $param
        );
        return redirect('db');
    }
}
