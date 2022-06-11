@extends('layouts.helloapp')

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>items</title>
</head>
<body>
    <h1>items</h1>
    @section('content')
        <table>
            @csrf
            {{-- <p>{{$msg}}</p> --}}
            <tr><th>id</th><th>category</th><th>color</th></tr>
            @foreach ($items as $item)
                <tr>
                    <th>{{$item->id}}</th>
                    <td></td>
                    <th>{{$item->category}}</th>
                    <th></th>
                    <th>{{$item->color}}</th>
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
