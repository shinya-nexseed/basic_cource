<?php
    // INSERT
    // $sql = 'INSERT INTO テーブル名 (カラム1,カラム2,カラム3) VALUES ("","","")'; 

    // 文字データを直接指定してINSERT
    // $sql = 'INSERT INTO contact (nickname,email,content) VALUES ("hoge","hoge@gmail.com","hogehoge")';

    // 文字列演算子を使用して変数で文を作る
    // $sql = 'INSERT INTO contact (nickname,email,content) VALUES ("'. $nickname . '","' . $email . '","' . $content . '")';

    // sprintf()関数を使用して文を作る
    // $sql = sprintf('文字列%s文字列%s文字列',
    //       "値1","値2","値3"
    //   );
    $sql = sprintf('INSERT INTO contact (nickname,email,content) VALUES ("%s","%s","%s")',
          $nickname,
          $email,
          $content
      );

    // SET句 (VALUES句を使わない方法)
    // $sql = 'INSERT INTO contact SET nickname="hoge3", email="hoge@gmail.com", content="hogehoge"';

    // サニタイズ
    htmlspecialchars()
