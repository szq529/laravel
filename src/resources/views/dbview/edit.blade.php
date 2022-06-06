@extends('layouts.helloapp')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db/edit</title>
</head>
<body>
    <h1>edit</h1>
    @section('menber')
        @parent
        更新ページ
    @endsection
    @section('content')
    <form action="/db/edit" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" method="{{$from->id}}">
            <tr></tr>
                <th>name:</th>
                <td><input type="hideen" name="name" value="{{$from->name}}"></td>
            </tr>
            <tr>
                <th>mail:
                </th>
                <td><input type="" name="mail" value="{{$from->mail}}"></td>
            </tr>
            <tr>
                <th>age:</th>
                <td><input type="" name="age" value="{{$from->age}}"></td>
            </tr>
            <tr>
                <th>
                </th>
                    <td><input type="submit" value="send"></td>
            </tr>
        </table>
    </form>
    @endsection
    @section('footer')
    copyright ~~~~
    @endsection
</body>
</html>
