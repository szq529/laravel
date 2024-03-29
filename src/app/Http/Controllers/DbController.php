<?php

namespace App\Http\Controllers;

use App\Models\Human;
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
            // $foo = DB::select('select * from human');
            // $foo = DB::table('human')->get(); //クエリビルダ使用
            $foo = DB::table('humans')->orderBy('age', 'asc')->get();
        }
        return view('dbview.db', ['foo' => $foo]);
    }

    //詳細
    public function show(Request $request)
    {
        $page = $request->page;
        $foos = DB::table('humans')
            ->offset($page * 3)
            ->limit(3)
            ->get();
        // $id = $request->id;
        // $foos = DB::table('human')->where('id', '<=', $id)->get(); //クエリビルダ使用
        // dd($foo);
        // $min = $request->min;
        // $max = $request->max;
        // $foos = DB::table('human')->whereRaw('age >= ? and age <= ?', [$min, $max])->get();
        // // ddd($foos);
        return view('dbview.show', ['foos' => $foos]);
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
        DB::table('humans')->insert($param);
        // DB::insert(
        //     'insert into
        // human (name, mail, age)
        // values(:name, :mail, :age)',
        //     $param
        // );
        return redirect('db');
    }

    // データ取得、編集form
    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $foo = DB::table('humans')->where('id', $request->id)->first();
        // DB::select('SELECT * FROM humans WHERE id = :id', $param);
        // dd($param);
        return view('dbview.edit', ['from' => $foo]);
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
        DB::table('humans')->where('id', $request->id)->update(
            // 'UPDATE human SET name = :name, mail = :mail, age = :age WHERE id = :id',
            $param
        );
        return redirect('db');
    }

    // データ取得、削除
    public function del(Request $request)
    {
        // $param = ['id' => $request->id];
        $foo = DB::table('humans')->where('id', $request->id)->first();
        // ('SELECT * FROM human WHERE id = :id', $param);
        // dd($param);
        return view('dbview.delete', ['from' => $foo]);
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id];
        // ddd($param);
        DB::table('humans')->where('id', $request->id)->delete();
        // ('DELETE FROM human WHERE id = :id',
        //     $param);
        return redirect('db');
    }


    public function find(Request $request)
    {
        return view('dbview.find');
    }

    public function search(Request $request)
    {
        // requestされたidを取得する
        $human = Human::find($request->input)->get();

        // 値を取得する
        // 例：$item = Item::where('フィールド',値);
        $human = Human::where('id', $request->input)->first();

        // model内のIdEqualを設定、使用
        // $human = Human::idEqual($request->input)->first();
        $param = ['input' => $request->input, 'id' => $human];
        // dd($param);
        return view('dbview.find', ['param' => $param]);
    }

    // public function getData()
    // {
    // }
}
