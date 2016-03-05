<?php

    //データベースに接続
    // DB名が違う
    define('PDO_DSN', 'mysql:dbname=oneline_bbs;host=localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');

    $dbh = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $dbh->query('SET NAMES utf8');


    //POST送信が行われたら、下記の処理を実行
    //テストコメント
    if(isset($_POST) && !empty($_POST)){

        echo '$_POSTが存在する';

        //SQL文作成(INSERT文)
        // $_POST['nickname']と$_POST['comment']
        // カラム名が違う
        // 1. 文を作る
        // $sql = 'INSERT INTO posts SET id=NULL, nickname="hogehoge", comment="昼寝がしたい", created=NOW()';
        // 必要な値を変数化する
        $nickname = $_POST['nickname'];
        $comment = $_POST['comment'];
        $sql = sprintf('INSERT INTO posts SET id=NULL, nickname="%s", comment="%s", created=NOW()',$nickname,$comment);
        echo '<br>';
        echo $sql;
        echo '<br>';
        // プログラミングで日時を扱う場合
        // どの言語でもそれ専用の関数がだいたい用意されている
        // PHPでもMySQLでも現在日時を取得することができます。
        // NOW()はSQL文が提供するNOW()関数
        // 現在日時を返すため、createdなどユーザーがデータを
        // 登録する際の日時の登録に使用する

        // 2. prepare
        $stmt = $dbh->prepare($sql);

        // 3. execute
        $stmt->execute();

    }

    // SELECT文
    $sql = 'SELECT * FROM posts ORDER BY created DESC';
    // 2. prepare
    $stmt = $dbh->prepare($sql);
    // 3. execute
    $stmt->execute();

    //データベースから切断
    $dbh = null;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/form.css">
  <link rel="stylesheet" href="assets/css/timeline.css">
  <link rel="stylesheet" href="assets/css/main.css">

</head>
<body>

  <div class="container">
    <div class="row">

      <div class="col-md-4 content-margin-top">
        <!-- つぶやきフォーム -->
        <form action="bbs_no_css.php" method="post">
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="nickname" class="form-control"
                       id="validate-text" placeholder="ニックネーム" required>

              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>

          </div>

          <div class="form-group">
            <div class="input-group" data-validate="length" data-length="4">
              <textarea type="text" class="form-control" name="comment" id="validate-length" placeholder="つぶやき" required></textarea>
              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
          </div>

          <button type="submit" class="btn btn-primary col-xs-12" disabled>つぶやく</button>
        </form>
      </div>

      <div class="col-md-8 content-margin-top">
        <!-- つぶやき一覧表示 -->
        <!-- while文開始 -->
        <?php while($rec = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <h2><a href="#"><?php echo $rec['nickname']; ?></a> <span><?php echo $rec['created']; ?></span></h2>
            <p><?php echo $rec['comment']; ?></p>
        <!-- while文終了 -->
        <?php endwhile; ?>
      </div>

    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/form.js"></script>
</body>
</html>



















