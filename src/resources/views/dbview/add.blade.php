@extends('layouts.helloapp')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db/add</title>
</head>
<body>
    <h1>add</h1>
    @section('menber')
        @parent
        新規ページ
    @endsection
    @section('content')
    <form action="/add" method="post">
        <table>
            @csrf
            <tr>
                @error('name')
                <th>ERROR</th>
                <td>{{$message}}</td>
                @enderror
                <th>name:</th>
                <td><input type="text" name="name" value="{{ old('name')}}"></td>
            </tr>
            <tr>
                @error('mail')
                <th>ERROR</th>
                <td>{{$message}}</td>
                @enderror
                <th>mail:
                </th>
                <td><input type="text" name="mail" value="{{ old('mail')}}"></td>
            </tr>
            <tr>
                @error('age')
                <th>ERROR</th>
                <td>{{$message}}</td>
                @enderror
                <th>age:</th>
                <td><input type="text" name="age" value="{{ old('age')}}"></td>
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
