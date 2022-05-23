<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hellocontrollerのページ</title>
</head>
<body>
    {{-- <h1>Index</h1>
    <p>this is Index page</p>
    <a href="/hello/other">go to <b>other</b> page</a> --}}
    <ul>
        <li>{{ $request }}</li>
        {{-- <li>{{ $response }}</li> --}}
    </ul>
</body>
</html>
