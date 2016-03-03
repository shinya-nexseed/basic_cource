<?php
    // 変数
    $dsn = 'mysql:dbname=phpkiso3;host=localhost';

    // 定数
    define('PDO_DSN', 'mysql:dbname=phpkiso3;host=localhost');

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

    // SELECT文で取得したデータの表示ほげほげ
    var_dump($stmt); // 実際に使えるデータではなく、objectというものが返ってくる

    // 真偽値の種類
    // bool型 true / false
    // int型 1 / 0

    while (1) {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        // $stmtに格納されたobjectから値をひとつひとつ取り出して$recに入れる
        // 例
        // $rec = array("id"=>"1", "nickname"=>"user1", "email"=>"user1@gmail.com", "content"=>"プログラミングしたい！");
        // $recの中にcontactテーブルのカラム名をキーにして値は入っている

        if ($rec == false) {
            // 繰り返し文から強制的に抜ける
            break;
        }

        // どれだけ変数などの値を出力して確認してみるかがプログラミング学習では大事
        // echo "<pre>";
        // var_dump($rec);
        // echo "</pre>";

        // PHPの連想配列からキーを指定してデータを取得すう方法
        echo "<br>";
        echo $rec["id"];
        echo $rec["nickname"];
        echo $rec["email"];
        echo $rec["content"];
        echo "<br>";

    }

    // DB接続を切断
    $dbh = null;

?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

</body>
</html>








