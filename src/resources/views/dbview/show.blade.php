@extends('layouts.helloapp')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db/show</title>
</head>
<body>
    <h1>show</h1>
    @section('menber')
        @parent
        詳細ページ
    @endsection
    @section('content')
        <table>
            @if ($foos != null)
            @foreach ($foos as $foo)
            <tr>
                <th>id:</th>
                <td>{{$foo->id}}</td>
            </tr>
            <tr>
                <th>name:</th>
                <td>{{$foo->name}}</td>
            </tr>
            @endforeach
            @endif
        </table>
    @endsection
    @section('footer')
    copyright ~~~~
    @endsection
</body>
</html>
