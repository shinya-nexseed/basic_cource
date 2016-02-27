<?php
    // スーパーグローバル変数
    // $_POST
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo $_POST;

    // 連想配列
    // echo $_POST['nickname'];
    // echo $_POST['email'];
    // echo $_POST['content'];

    // 連想配列の作り方
    // $配列名 = array("キー1" => "値1","キー2" => "値2","キー3" => "値3");
    // $members = array("haruka" => "tsuchiya", "Kaai" => "Suzuki");
    // echo "<br>";
    // var_dump($members);

    // $_POSTの内容例
    // $_POST = array("nickname" => "aaaaa","email" => "b@b.com","content" => "ccccc");

    // 入力内容をそれぞれ変数化
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    // 入力内容チェック (バリデーション)
    if ($nickname === '') {
        $nickname_result = 'ニックネームが入力されていません。';
    } else {
        $nickname_result = 'お名前 : ' . $nickname . '様';
    }

    if ($email === '') {
        $email_result = 'メールアドレスが入力されていません。';
    } else {
        $email_result = 'メールアドレス : ' . $email;
    }

    if ($content === '') {
        $content_result = 'お問い合わせ内容が入力されていません。';
    } else {
        $content_result = 'お問い合わせ内容 : ' . $content;
    }
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
  <p><?php echo $nickname_result; ?></p>
  <p><?php echo $email_result; ?></p>
  <p><?php echo $content_result; ?></p>
  <div>
    <!-- <a href="contact.html">戻る</a> -->
    <form method="post" action="thanks.php">
      <input type="button" onclick="history.back()" value="戻る">
      <input type="hidden" name="nickname" value="<?php echo $nickname; ?>">
      <input type="hidden" name="email" value="<?php echo $email; ?>">
      <input type="hidden" name="content" value="<?php echo $content; ?>">
      <!-- もしすべての情報が入力されていたら表示 -->
      <?php if($nickname !== '' && $email !== '' && $content !== ''): ?>
          <input type="submit" value="送信する">
      <?php endif; ?>
    </form>
  </div>
</body>
</html>
