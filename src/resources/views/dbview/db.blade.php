@extends('layouts.helloapp')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db</title>
</head>
<body>
    <h1>db</h1>
    @section('content')
        <table>
            @csrf
            {{-- <p>{{$msg}}</p> --}}
            <tr><th>name</th><th>mail</th><th>age</th></tr>
            @foreach ($foo as $foo)
                <tr>
                    <th>{{$foo->name}}</th>
                    <td></td>
                    <th>{{$foo->mail}}</th>
                    <th></th>
                    <th>{{$foo->age}}</th>
                    <td></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                    <th></th>
                    <td></td>
                </tr>
            @endforeach
        </table>
    @endsection
    @section('footer')
    copyright ~~~~
    @endsection
</body>
</html>
