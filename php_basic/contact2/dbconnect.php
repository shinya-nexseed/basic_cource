<?php
    // 変数
    $dsn = 'mysql:dbname=phpkiso2;host=localhost';

    // 定数
    define('PDO_DSN', 'mysql:dbname=phpkiso2;host=localhost');

    $user = 'root';
    // XAMPPのMySQLにはあらかじめrootユーザーが設定されています。

    $password = '';
    // XAMPPのMySQLのrootユーザーのパスワードは初期値なし、空です。

    // DBにPHPから接続するための初期設定
    $dbh = new PDO($dsn,$user,$password);
    // 文字化け対策
    $dbh->query('SET NAMES utf8');

    // 別のDB接続方法
    // PHPに定義されたDB用の関数を使って接続する方法
    // mysqli_query()関数など

    // SQL文を文字列で作成
    // PHPでSQLを実行するには、文字列で文を作成し、PDOが提供する仕組みを使って処理を発行する。
    $sql = 'SELECT * FROM contact'; 

    // SQL文をセット
    $stmt = $dbh->prepare($sql);
    
    // SQL文を実行
    $stmt->execute();

    // DB接続を切断
    $dbh = null;

?>









