# Docker + laravel + nginx + mysplでローカル環境構築
<!-- 
[参考URL](https://www.ritolab.com/entry/217)  
taminalにて  
```curl -s "https://laravel.build/app" | bash```

passwordを求められる

```laravel % curl -s "https://laravel.build/app" | bash```

``` _                               _
| |                             | |
| |     __ _ _ __ __ ___   _____| |
| |    / _` | '__/ _` \ \ / / _ \ |
| |___| (_| | | | (_| |\ V /  __/ |
|______\__,_|_|  \__,_| \_/ \___|_|

Warning: TTY mode requires /dev/tty to be read/writable.
    Creating a "laravel/laravel" project at "./app"
    Info from https://repo.packagist.org: #StandWithUkraine
    Installing laravel/laravel (v9.1.5)
      - Downloading laravel/laravel (v9.1.5)
      - Installing laravel/laravel (v9.1.5): Extracting archive
    Created project in /opt/app
    > @php -r "file_exists('.env') || copy('.env.example', '.env');"
    Loading composer repositories with package informatio
    ~~ 省略 ~~
```

- 作成したプロジェクトディレクトリへ移動し、コンテナを立ち上げる
```cd app```
```./vendor/bin/sail up```
サーバーが立ち上がる -->

<!-- - dockerコマンドでimage,container確認  
```docker image ls```

```
REPOSITORY                   TAG       IMAGE ID       CREATED         SIZE
selenium/standalone-chrome   latest    66e5439a061b   2 weeks ago     1.19GB
redis                        alpine    34e1dc356a22   2 weeks ago     32.4MB
getmeili/meilisearch         latest    8c2830b31856   5 weeks ago     64.5MB
mysql/mysql-server           8.0       434c35b82b08   3 months ago    417MB
laravelsail/php81-composer   latest    d109f96a6d48   4 months ago    531MB
mailhog/mailhog              latest    4de68494cd0d   20 months ago   392MB
```

```docker container ps -a```

```
app % docker container ps -a
CONTAINER ID   IMAGE                         COMMAND                  CREATED              STATUS                        PORTS                                            NAMES
5e5cfaa90ddd   sail-8.1/app                  "start-container"        About a minute ago   Up About a minute             0.0.0.0:80->80/tcp, 8000/tcp                     app-laravel.test-1
002d20d64067   selenium/standalone-chrome    "/opt/bin/entry_poin…"   About a minute ago   Up About a minute             4444/tcp, 5900/tcp                               app-selenium-1
572d136df265   mailhog/mailhog:latest        "MailHog"                About a minute ago   Up About a minute             0.0.0.0:1025->1025/tcp, 0.0.0.0:8025->8025/tcp   app-mailhog-1
c8fde95d500d   getmeili/meilisearch:latest   "tini -- /bin/sh -c …"   About a minute ago   Up About a minute (healthy)   0.0.0.0:7700->7700/tcp                           app-meilisearch-1
7069ec58329c   mysql/mysql-server:8.0        "/entrypoint.sh mysq…"   About a minute ago   Up About a minute (healthy)   0.0.0.0:3306->3306/tcp, 33060-33061/tcp          app-mysql-1
03ad23543cb3   redis:alpine                  "docker-entrypoint.s…"   About a minute ago   Up About a minute (healthy)   0.0.0.0:6379->6379/tcp                           app-redis-1
```

[http://localhost/](http://localhost/)へアクセス、laravelの初期画面

![laravel初期画面](./laravel_start.png) -->

<!-- ## sailコマンドをailas設定

```vendor/bin/sail```を```sail```に置き換える

```alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'```を追記する

```
vim ~/.zshrc

# sail commandのalias
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail
```

作成したディレクトリにてcommnad実行、反映
```
source ~/.zshrc
```

### nginxの追加

[参考](https://laravel.com/docs/8.x/deployment#nginx)
```vim dockdre-compose.yml```
```
    nginx:
        image: nginx
        container_name: nginx
        ports:
            - 8080:80
        volumes:
            - ./web:/var/www
            - ./etc/nginx/default.conf/nginx.conf:/etc/nginx/conf.d/default.conf
        depends_on:
            - php
```

```vim etc/nginx/conf.d/default.conf/inidex.php```
 -->

### ```docker-compose.yml```ファイルの作成

```docker-compose.yml
version: "3.9"

services:
    app:
        # php コンテナ
        build:
            context: .
            dockerfile: ./app/Dockerfile
        volumes:
            - ./src/:/app
    web:
        # nginx コンテナ
        build:
            context: .
            dockerfile: ./docker/web/Dockerfile
        ports:
            - 8080:80
        depends_on:
            - app
        volumes:
            - ./src/:/app
    db:
        # mysql コンテナ
        build:
            context: .
            dockerfile: ./docker/db/Dockerfile
        ports:
            - 3306:3306
        environment:
            MYSQL_DATABASE: database
            MYSQL_USER: user
            MYSQL_PASSWORD: password
            MYSQL_ROOT_PASSWORD: password
            TZ: 'Asia/Tokyo'
        volumes:
            - mysql-volume:/var/lib/mysql
volumes:
    mysql-volume:
```

### 各Dockerfile

#### app(php)
```
FROM php:8.0-fpm

ENV TZ Asia/Tokyo

RUN apt-get update && \
    apt-get install -y git unzip libzip-dev libicu-dev libonig-dev && \
    docker-php-ext-install intl pdo_mysql zip bcmath

COPY ./app/php.ini /usr/local/etc/php/php.ini

COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

WORKDIR /app
```

#### web(nginx)
```
FROM nginx:1.20-alpine

ENV TZ Asia/Tokyo

COPY ./docker/web/default.conf /etc/nginx/conf.d/default.conf
```

#### db(mysql)
```
FROM mysql:8.0

COPY ./docker/db/my.conf /etc/my.conf
```

- 3つのコンテナが作成される
```docker-compose up -d --build```

```
laravel % docker container ps -a
CONTAINER ID   IMAGE         COMMAND                  CREATED             STATUS             PORTS                               NAMES
b8e098958ac0   laravel_db    "docker-entrypoint.s…"   9 seconds ago       Up 7 seconds       0.0.0.0:3306->3306/tcp, 33060/tcp   laravel-db-1
c569c60a1811   laravel_web   "/docker-entrypoint.…"   About an hour ago   Up About an hour   0.0.0.0:8080->80/tcp                laravel-web-1
06ad6812158d   laravel_app   "docker-php-entrypoi…"   About an hour ago   Up About an hour   9000/tcp                            laravel-app-1
```

### mysql接続確認

```
//  dbコンテナに入る
laravel % docker-compose exec db bash

root@b8e098958ac0:/# mysql -u root -p
// この段階では、ymlファイル内のpassword入力
Enter password:

Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 15
Server version: 8.0.29 MySQL Community Server - GPL

Copyright (c) 2000, 2022, Oracle and/or its affiliates.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql>
```
<!-- できたああああああ！ -->

### appコンテナからdbコンテナへ接続

laravel installでできたsrc/.envファイルにymlファイルに定義した内容を指定
DB_HOSTにはMySQLコンテナのサービス名

```src/.env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=password
```

マイグレーションを実行して、接続確認
```
laravel % docker-compose exec app bash
root@0b8668e3911e:/app# php artisan migrate
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (63.47ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (51.16ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (49.98ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (59.13ms)
root@0b8668e3911e:/app#
```

```
root@b8e098958ac0:/# mysql -u root -p
mysql> use database;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show tables;
+------------------------+
| Tables_in_database     |
+------------------------+
| failed_jobs            |
| migrations             |
| password_resets        |
| personal_access_tokens |
| users                  |
+------------------------+
5 rows in set (0.00 sec)

mysql>
```
[参考](https://qiita.com/hinako_n/items/f15646ea548bcdc8ac6c)

<!-- ### 設定後、使用例

- コンテナ立ち上げる
  ```sail up```
- detachedモード
  ```sail up -d```
- コンテナ停止
  ```sail down```
- コンテナへ接続
  ```sail shell```
- mysqlへlogin(初回rootユーザー)
  ```sail mysql -uroot```
 -->

### laravel uiライブラリのインストール

srcディレクトリにて
```
laravel % composer require laravel/ui
Info from https://repo.packagist.org: #StandWithUkraine
Using version ^3.4 for laravel/ui
./composer.json has been created
Running composer update laravel/ui
Loading composer repositories with package information
Info from https://repo.packagist.org: #StandWithUkraine
Updating dependencies
Lock file operations: 35 installs, 0 updates, 0 removals
  - Locking doctrine/inflector (2.0.4)
  - Locking doctrine/lexer (1.2.3)
  - Locking egulias/email-validator (3.1.2)

<!-- 略 -->

23 package suggestions were added by new dependencies, use `composer suggest` to see details.
Generating autoload files
22 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
```

```
src % composer require laravel/ui
Info from https://repo.packagist.org: #StandWithUkraine
Using version ^3.4 for laravel/ui
./composer.json has been updated
Running composer update laravel/ui
Loading composer repositories with package information
Info from https://repo.packagist.org: #StandWithUkraine
Updating dependencies
Lock file operations: 1 install, 0 updates, 0 removals
  - Locking laravel/ui (v3.4.5)

~~~~~~~略~~~~~~~~

Discovered Package: laravel/ui
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Package manifest generated successfully.
77 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
> @php artisan vendor:publish --tag=laravel-assets --ansi --force
No publishable resources for tag [laravel-assets].
Publishing complete.
```

```
[saki-pro💻@Saki 05/08 21:41]+[mcv]
src % php artisan ui bootstrap --auth
Bootstrap scaffolding installed successfully.
Please run "npm install && npm run dev" to compile your fresh scaffolding.
Authentication scaffolding generated successfully.
```

```npm install && npm run dev```でnot found

#### node install

[参考](https://qiita.com/sugasaki/items/ad4d5d88965057840a04)

```
brew install nodebrew
nodebrew -v
mkdir -p ~/.nodebrew/src
nodebrew install-binary latest
```
```
src % nodebrew install-binary latest
Fetching: https://nodejs.org/dist/v18.1.0/node-v18.1.0-darwin-x64.tar.gz

src % nodebrew list
v16.9.1
v16.14.2
v18.1.0

current: v16.14.2
```

- 再度installコマンド

```
src % npm install && npm run dev
⸨########⠂⠂⠂⠂⠂⠂⠂⠂⠂⠂⸩ ⠹ idealTree:esrecurse: timing idealTree:node_modules/esrecurse Completed in 3ms
~~~~~~~~~~~~~

> dev
> npm run development


> development
> mix

Additional dependencies must be installed. This will only take a moment.

Running: npm install resolve-url-loader@^5.0.0 --save-dev --legacy-peer-deps

Finished. Please run Mix again.

```

Running:の箇所のコマンドを実行

```
npm install resolve-url-loader@^5.0.0 --save-dev --legacy-peer-deps
```

```npm run dev```

```

~~~~~~~略~~~~~~~~
✔ Compiled Successfully in 10506ms
┌───────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┬──────────┐
│                                                                                                                                                              File │ Size     │
├───────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┼──────────┤
│                                                                                                                                                        /js/app.js │ 2.23 MiB │
│                                                                                                                                                       css/app.css │ 202 KiB  │
└───────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────────┴──────────┘
1 WARNING in child compilations (Use 'stats.children: true' resp. '--stats-children' for more details)
webpack compiled with 1 warning
```





<!-- 

# ログイン・ログアウト機能

- 対象ファイル
1. ```app/Providers/AppServiceProvider.php```
2. ```resources/views/components/header.blade.php```

# cssのファイル作成・反映
- cssファイルの場所
  ```app/public/css/```内に```style.css```を作成

```style.css
@charset "utf-8";

html{
    font-size: 62.5%;
}

body{
    color: #333;
    font-size: 1.6rem;
}
```

- 反映させるために
    ```index.blade.php```内に記載

```
<link rel="stylesheet" href="{{ asset('css/style.css') }}">  
```

# コントローラー作成

CLI

```
php artisan make:controller HelloController
Controller already exists!
```

app/Http/Controllersディレクトリに`HelloController.php`ファイルが作成される

## ファイル内にコントローラーの内容を記述

```HelloController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index () 
    {
        $hello = 'Hello,World!';
        $hello_array = ['Hello', 'こんにちは', 'ニーハオ'];

        return view('index', compact('hello', 'hello_array'));
    }

}
```

## ルーティングの設定

```app/routes```内の```web.php```に追記

```
Route::get('/index', 'App\Http\Controllers\HelloController@index');
```

パスはフルで記載

/indexでアクセスされた時に、HelloControllerのindexアクションが実行される。

## 表示するためのファイルを作成

親ビューへ記載
```resources/views/common```内に```layout.blade.php```を作成

```
@yield('index')
```

```resources/views```内に```index.blade.php```を作成

``` 
@extends('common.layout')

@section('index')
    <p>{{ $hello }}</p>
    @foreach ($hello_array as $hello_word)
        {{ $hello_word }}<br>
    @endforeach
@endsection
```

参考:https://qiita.com/yukibe/items/7bab0d596ae9a0930f18
 -->
