
{{-- resources/views/layouts/helloapp.blade.phpから読み込み --}}
@extends('layouts.helloapp')

<body>
    <h1>validates</h1>
    <p>ここにメッセージ{{$msg}}</p>
    @section('content')
    @if ($errors->any())
    <p>入力に誤り</p>
        {{-- <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> --}}
    @endif
    <form action="/validate" method="post">
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
