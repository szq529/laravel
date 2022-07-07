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
            {{-- <form action="/db/find" method="post">
                @csrf
                <input type="text" name="input">
                <input type="submit" value="find">
            </form> --}}
                    <table>
                        @foreach($humans as $human)
                        <tr>
                            <th>
                                {{$human -> id}}
                                <td>
                                {{$human -> name}}
                                </td>
                            </th>
                        </tr>
                        @endforeach
                    </table>
    @endsection
    @section('footer')
    copyright ~~~~
    @endsection
</body>
</html>
