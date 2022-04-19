# ログイン・ログアウト機能

- 対象ファイル
1. ```app/Providers/AppServiceProvider.php```
2. ```resources/views/components/header.blade.php```

- httpsの設定
1. 

# cssのファイル作成・反映
- cssファイルの場所
  ```app/public/css/```内に```style.css```を作成

```style.css
@charset "utf-8";

html{
    font-size: 62.5%;
}

body{
    color: #333;
    font-size: 1.6rem;
}
```

- 反映させるために
    ```index.blade.php```内に記載

```
<link rel="stylesheet" href="{{ asset('css/style.css') }}">  
```


# コントローラー作成

CLI

```
php artisan make:controller HelloController
Controller already exists!
```

app/Http/Controllersディレクトリに`HelloController.php`ファイルが作成される

## ファイル内にコントローラーの内容を記述

```HelloController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index () 
    {
        $hello = 'Hello,World!';
        $hello_array = ['Hello', 'こんにちは', 'ニーハオ'];

        return view('index', compact('hello', 'hello_array'));
    }

}
```

## ルーティングの設定

```app/routes```内の```web.php```に追記

```
Route::get('/index', 'App\Http\Controllers\HelloController@index');
```

パスはフルで記載

/indexでアクセスされた時に、HelloControllerのindexアクションが実行される。

## 表示するためのファイルを作成

親ビューへ記載
```resources/views/common```内に```layout.blade.php```を作成

```
@yield('index')
```

```resources/views```内に```index.blade.php```を作成

```
@extends('common.layout')

@section('index')
    <p>{{ $hello }}</p>
    @foreach ($hello_array as $hello_word)
        {{ $hello_word }}<br>
    @endforeach
@endsection
```

参考:https://qiita.com/yukibe/items/7bab0d596ae9a0930f18

