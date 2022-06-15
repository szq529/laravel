@extends('layouts.helloapp')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find</title>
</head>
<body>
    <h1>find</h1>
            @section('content')
            <form action="/item/find" method="POST">
                @csrf
                <input type="text" name="input" value="{{$input}}">
                <input type="submit" value="find">
            </form>
            @if (!isset($param))
                <table>
                    <tr><th>find</th></tr>
                    <tr>
                        <th>{{$item->getData()}}</th>
                    </tr>
                </table>
            @endif
    @endsection
    @section('footer')
    copyright ~~~~
    @endsection
</body>
</html>
