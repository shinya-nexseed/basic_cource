<?php
    
    //POST送信が行われたら、下記の処理を実行
    if(isset($_POST) && !empty($_POST)){
        //データベースに接続

        //SQL文作成(INSERT文)

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
      <div>
        <input type="text" name="nickname" placeholder="nickname" required>
      </div>
      <div>
        <textarea type="text" name="comment" placeholder="comment" required></textarea>
      </div>
      <button type="submit" >つぶやく</button>
    </form>

    <h4>nickname <a href="#">hoge</a> <span>2015-12-02 10:10:20</span></h4>
    <p>つぶやきコメント</p>

    <h4>nickname <a href="#">fuga</a> <span>2015-12-02 10:10:10</span></h4>
    <p>つぶやきコメント2</p>
</body>
</html>
