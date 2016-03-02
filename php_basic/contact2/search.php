<?php
    require('function.php');
    // include();
    // DBに接続

    special_echo('ほげ');
    define('PDO_DSN', 'mysql:dbname=phpkiso3;host=localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');

    $dbh = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $dbh->query('SET NAMES utf8');

    $id = 'なし';
    $nickname = 'なし';
    $email = 'なし';
    $content = 'なし';

    // empty()関数
    // ()の中に指定した変数が存在するかどうか
    // なければtrueを返す
    // !は真偽値を逆転させる
    if (!empty($_POST)) {

        // SELECT文 (一件取得 : WHERE句を使って条件指定)
        // $_POST = array('id'=>'1');
        $id = $_POST['id']; // input id に入っている値
        // 1.文を作成する
        $sql = 'SELECT * FROM contact WHERE id=' . $id;

        // sprintf()関数
        $sql = sprintf('SELECT * FROM contact WHERE id=%d',$id);

        $sample_str = sprintf('ほげ%sふが%sほが%s','hoge','fuga','hoga');
                              //   A    B    C  // a       b     c
        echo $sample_str;
        $sample_str2 = sprintf('私は%sのテストで%d点でした。','2週目', 100);
        echo '<br>';
        echo $sample_str2;

        // 2.文をprepareする
        $stmt = $dbh->prepare($sql);

        // 3.文をexecuteする
        $stmt->execute();

        // 取得結果をブラウザに表示
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // echo '<pre>';
        // var_dump($rec);
        // echo '</pre>';
        # $rec = array('id'=>'1', 'nickname'=>'user1', 'email'=>'user1@gmail.com', 'content'=>'プログラミングしたい！');
        $id = $rec['id'];
        $nickname = $rec['nickname'];
        $email = $rec['email'];
        $content = $rec['content'];
    }

    $dbh = null;
    
?>


<html lang="ja">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
  <form action="search.php" method="post">
    <input type="text" name="id">
    <input type="submit" value="検索">
  </form>

  <!-- if $_POSTが存在すれば -->
  <?php if(!empty($_POST)): ?>
      <div>
        <p>id : <?php echo $id; ?></p>
        <p>nickname : <?php echo $nickname; ?></p>
        <p>email : <?php echo $email; ?></p>
        <p>content : <?php echo $content; ?></p>
      </div>
  <?php endif; ?>

</body>
</html>











