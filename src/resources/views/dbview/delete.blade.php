@extends('layouts.helloapp')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db/delete</title>
</head>
<body>
    <h1>delete</h1>
    @section('menber')
        @parent
        削除
    @endsection
    @section('content')
    <form action="/db/delete" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{$from->id}}">
            <tr>
                <th>name:</th>
                <td><input type="text" name="name" value="{{$from->name}}"></td>
            </tr>
            <tr>
                <th>mail:
                </th>
                <td><input type="text" name="mail" value="{{$from->mail}}"></td>
            </tr>
            <tr>
                <th>age:</th>
                <td><input type="text" name="age" value="{{$from->age}}"></td>
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
