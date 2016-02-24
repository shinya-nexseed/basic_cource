<?php
    // 入力内容をそれぞれ変数化
    // 入力内容チェック (バリデーション)
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>入力内容確認</title>
</head>
<body>
  <h1>入力内容確認</h1>
  <!-- 入力内容を出力 -->
  <div>
    <!-- <a href="contact.html">戻る</a> -->
    <form>
      <input type="button" onclick="history.back()" value="戻る">
      <!-- もしすべての情報が入力されていたら表示 -->
      <?php if(): ?>
          <input type="submit" value="送信する">
      <?php endif; ?>
    </form>
  </div>
</body>
</html>
