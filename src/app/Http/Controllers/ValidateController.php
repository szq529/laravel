<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

// use Dotenv\Validator;
use Illuminate\Http\Request;
use Validator;

class ValidateController extends Controller
{
    /**
     * ポスト作成フォームの表示
     *
     * @return \Illuminate\View\View
     */

    //  /validateへアクセス後の処理・表示
    public function index(Request $request)
    {
        $validator = Validator::make(
            $request->query(),
            [
                'id' => 'required',
                'pass' => 'required',
            ]
        );
        if ($validator->fails()) {
            $msg = 'クエリー問題あり';
        } else {
            $msg = '受け付けた';
        }
        return view('hello.validate_rule', ['msg' => $msg]);
    }

    /**
     * 新しいブログポストの保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  validate_ruleの設定
    public function store(Request $request)
    {
        // validateメソッド利用
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ]);
        // $this->validate($request, $validated);
        if ($validator->fails()) {
            return redirect('/validate_rule')
                ->withErrors($validator)
                ->withInput();
        }
        return view('hello.validate_rule', ['msg' => '入力されました!']);
        // if ($validated->falis()) {
        //     return redirect('/validate_rule')
        //         ->withErrors($validator)
        //         ->withInput();
        // }
    }
}
