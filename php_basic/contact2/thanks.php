<?php
    // 入力内容をそれぞれ変数化
    // var_dump($_POST);

    // 入力内容をそれぞれ変数化
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $content = $_POST['content'];
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
