<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class DbController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->id)) {
            $param = ['id' => $request->id];
            $foo = DB::select('select * from human where id = :id', $param);
        } else {
            $foo = DB::select('select * form human');
        }
        // $foo = DB::select('select * from human');
        return view('dbview.db', ['foo' => $foo]);
    }
    public function add(Request $request)
    {
        return view('dbview.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into human (name, mail, age) values(:name, :mail, :age)', $param);
        return redirect('dbview.db');
    }
}
