<?php

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
        $nickname = $_POST['nickname']; // input id に入っている値
        // 1.文を作成する
        $sql = 'SELECT * FROM contact WHERE nickname LIKE "%' . $nickname . '%"';

        // sprintf()関数
        $sql = sprintf('SELECT * FROM contact WHERE nickname LIKE "%%%s%%"',$nickname);

        // $sql = 'SELECT * FROM contact WHERE nickname LIKE "%shi%"';

        // $sample_str = sprintf('ほげ%sふが%sほが%s','hoge','fuga','hoga');
        //                       //   A    B    C  // a       b     c
        // echo $sample_str;
        // $sample_str2 = sprintf('私は%sのテストで%d点でした。','2週目', 100);
        // echo '<br>';
        // echo $sample_str2;

        // 2.文をprepareする
        $stmt = $dbh->prepare($sql);

        // 3.文をexecuteする
        $stmt->execute();

        // 構文の条件式 () の中には真偽値で値が判定できる条件を必ず記入
        // while (1) {
        //     // 取得結果をブラウザに表示
        //     $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            
        //     if ($rec == false) {
        //         break;
        //     }

        //     // echo '<pre>';
        //     // var_dump($rec);
        //     // echo '</pre>';
        //     # $rec = array('id'=>'1', 'nickname'=>'user1', 'email'=>'user1@gmail.com', 'content'=>'プログラミングしたい！');
        //     $id = $rec['id'];
        //     $nickname = $rec['nickname'];
        //     $email = $rec['email'];
        //     $content = $rec['content'];

        //     echo $id;
        //     echo $nickname;
        //     echo $email;
        //     echo $content;
        //     echo '<br>';
        // }


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
    <label>ニックネームで検索(部分一致)</label>
    <input type="text" name="nickname">
    <input type="submit" value="検索">
  </form>

  <!-- if $_POSTが存在すれば -->
  <?php if(!empty($_POST)): ?>

      <!-- while文の開始 -->
      <?php while($rec = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <div>
            <p>id : <?php echo $rec['id']; ?></p>
            <p>nickname : <?php echo $rec['nickname']; ?></p>
            <p>email : <?php echo $rec['email']; ?></p>
            <p>content : <?php echo $rec['content']; ?></p>
            <hr>
          </div>
      <!-- while文の終了 -->
      <?php endwhile; ?>

  <?php endif; ?>

</body>
</html>











