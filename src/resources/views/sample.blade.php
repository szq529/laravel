<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サンプルのページ</title>
</head>
<body>
    <h1>hello,world!!</h1>
    <ul>
        {{-- /{noname}/{pass?}のパラメータの内容を表示 --}}
        <li>ID:{{ $noname }}</li>
        <li>PASS:{{ $pass }}</li>
    </ul>
</body>
</html>
