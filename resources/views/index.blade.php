<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @extends('common.layout')

    @section('index')
        <h1>{{ $hello }}</h1>
        @foreach ($hello_array as $hello_word)
            {{ $hello_word }}<br>
        @endforeach
    @endsection

</body>
</html>
