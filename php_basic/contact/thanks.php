<?php
    // 入力内容をそれぞれ変数化
    // var_dump($_POST);

    // 入力内容をそれぞれ変数化
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];

    // 定数名は大文字で記載し、単語をアンダースコアで区切る
    define('PDO_DSN', 'mysql:dbname=phpkiso3;host=localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');

    $dbh = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $dbh->query('SET NAMES utf8');

    // INSERT文1
    // INSERT INTO テーブル名 (カラム1, カラム2, カラム3 ...) VALUES (値1, 値2, 値3 ...)
    // $sql = 'INSERT INTO contact (`id`, `nickname`, `email`, `content`) VALUES (NULL, "user4", "user4@gmail.com", "MySQL学びたい")';

    // 文字連結復習
    // $nickname= "shinya";
    // echo 'A$nicknameB'; // 出力結果→  A$nicknameB
    // echo 'A' . $nickname . 'B'; // 出力結果→  AshinyaB
    // 結論 : 変数と文字を組み合わせて任意の文字列を作るには文字列演算子を使って文字連結させる

    // INSERT文2
    // INSERT INTO テーブル名 SET カラム1="値1", カラム2="値2"....
    $sql = 'INSERT INTO contact SET nickname="'
            .$nickname.
            '", email="'
            .$email.
            '", content="'
            .$content.
            '"';
    // $nickname = 'user1';
    // $email = 'user1@gmail.com';
    // $content = 'プログラミングしたい！';
    // 上記値がフォームに入力されたと仮定した場合の上記$sqlの内容結果
    // 'INSERT INTO contact SET nickname="user1", email="user1@gmail.com", content="プログラミングしたい！"'
    
    // prepare
    $stmt = $dbh->prepare($sql);

    // execute
    $stmt->execute();

    // DB切断
    $dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>お問い合わせ有難うございました！</title>
</head>
<body>
  <h1>お問い合わせ有難うございました！</h1>
    お問い合わせ内容詳細<br>
    お名前 : <?php echo $nickname; ?> 様<br>
    メールアドレス : <?php echo $email; ?> <br>
    お問い合わせ内容 : <?php echo $content; ?> <br>
</body>
</html>
