<!-- 
  PHPの対象外
  htmlコードは記述可
 -->
<?php 
    // PHPの対象内

    // echo文 → ブラウザに文字を出力する
    // echo "Hello world";
    
    // 変数の書き方
    // $変数名 = 値;
    
    // 最初に$が必要
    // 変数名は好きな文字列
    // = で右を左に代入
    // 変数に代入したい値を記述
    // セミコロン ; を記述
    $hello = "Hello world";
    // echo $hello;

    // データには型というものがある
    // string,int,bool等

    // 文字列型 (string)
    $str = "string";

    // 整数型 (int)
    $int = 3; // 数字として処理される
    $str_int = "3"; // 文字として処理される

    // 少数型 (float)
    $float = 3.14;

    // 配列 (array)
    $ary = array("要素1","要素2","要素3","要素4");
    // echo $ary[0];
    // 上記のように配列に格納した値の任意のものを呼び出したいときは
    // 配列名[Index]とカッコとIndexを使って指定する

    // 制御文
    // もし、条件がAだったら、Aの処理を実行。そうでなければBの処理を実行
    
    // if (条件) {
    //     処理A
    // }

    // サービスとしてユーザーに使用してもらう場合はこの$num内に格納する数字をユーザーのアクションで決定するなど
    $num = 99;

    if ($num == 100) {
        echo "Congrats:)";
    } else {
        echo "Try again!";
    }

    // Hello world

    // ほげほげ
    // foo bar

    // 条件に一致する間その処理を繰り返し発動する
    // for文

    // for (カウンタ初期化; 条件; 1処理後の挙動) { 
    //    繰り返す処理
    // }

    // htmlコードをechoで出力するとそのままコードとして処理してくれる
    // htmlとPHPの相性は良い
    echo "<br>";
    echo "<br>";

    for ($i=0; $i < 10; $i++) { 
        // echo "繰り返し";
        echo $i . "回目の処理"; // 文字列連結 → "文字" . "文字"
        echo "<br>"; // htmlタグ自体をecho文などで出力することも可能
    }

    echo "<br>";
    echo "<br>";

    // 配列と繰り返し文を使った実践的な書き方
    // $members配列を用意し、for文を使ってメンバーひとりひとりの名前を出力
    $members = array("Haruka", "Kaai", "Ai", "Shoma", "Yuichi");
    $count = count($members);
    // echo $count;

    for ($i=0; $i < 5; $i++) { 
        // echo $members[$i];
        // echo "<br>";
        $num = $i+1;
        echo "No." . $num . " : " . $members[$i];
        echo "<br>";
    }

 ?>
<!-- 
  PHPの対象外
  htmlコードは記述可
 -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">  
  <title></title>
</head>
<body>
  <h1><?php echo $hello; ?></h1>
  <!-- formの作成 -->
  <form method="GET" action="sample.php">
    <input type="text" name="nickname">
    <!-- <input type="email">
    <input type="password"> -->
    <input type="submit" value="送信">
  </form>
</body>
</html>


















