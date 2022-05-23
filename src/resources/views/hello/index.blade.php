<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hello/index</title>
</head>
<body>
    @extends('layouts.helloapp')

    @section('title','Index')

    @section('menubar')
        @parent
        インデックスページ
    @endsection

    @section('content')
        <p>本文</p>
        <p>書ける</p>
        <p>これはリンク<middleware>google.com</middleware></p>
        <p>これはリンク<middleware>yahoo.co.jp</middleware></p>
        {{-- <table>
            @foreach($data as $item)
            <tr>
                <th>
                    {{$item['name']}}
                    <td>
                        {{$item['mail']}}
                    </td>
                </th>
            </tr>
            @endforeach
        </table> --}}
        {{-- <p>'message' = {{$message}}</p>
        <p>'view_message' = {{$view_message}}</p> --}}
        {{-- eachディレクティブ --}}
        {{-- <ul>
            @each('components.item', $data, 'item')
        </ul> --}}

        {{-- includeで表示 --}}
        {{-- @include('components.message',
        ['msg_title'=>'ok!',
        'msg_content'=>'サブビュー'
        ]) --}}

        {{-- message componentsを使用 --}}
        {{-- @component('components.message')
            @slot('msg_title')
            CAUTION!
            @endslot
            @slot('msg_content')
            表示
            @endslot
        @endcomponent --}}
    @endsection

    @section('footer')
    copyright ~~~~
    @endsection
    {{-- <h1>Blad/Index</h1>
    <p>ディレクティブ</p>
    <ol>
        @foreach ($data as $item)
        @if($loop->first)
        <p>データ一覧</p><ul>
        @endif
        <li>No, {{$loop->iteration}}. {{$item}}</li>
        {{-- @else --}}
        {{-- @break --}}
        {{-- @if($loop->last)
        @endif
        @endforeach
    </ol> --}}
</body>
</html>
