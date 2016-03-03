<?php

  //POST送信が行われたら、下記の処理を実行
  //テストコメント
  if(isset($_POST) && !empty($_POST)){

    //データベースに接続
    // DB名が違う

    //SQL文作成(INSERT文)
    // $_POST['nickname']と$_POST['comment']
    // カラム名が違う

    //INSERT文実行

    //データベースから切断

    
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>

</head>
<body>
    <form action="bbs.php" method="post">
      <input type="text" name="nickname" placeholder="nickname" required>
      <textarea type="text" name="comment" placeholder="comment" required></textarea>
      <button type="submit" >つぶやく</button>
    </form>

    <!-- while文開始 -->
    <h2><a href="#">nickname Eriko</a> <span>2015-12-02 10:10:20</span></h2>
    <p>つぶやきコメント</p>
    <!-- while文終了 -->
</body>
</html>



