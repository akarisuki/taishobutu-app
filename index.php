<?php
      session_start();
      session_regenerate_id(true);
      if(isset($_SESSION['login'])===false){
          print'ログインされていません。<br />';
          print'<a href="../login/login.php">ログイン画面へ</a>';
          exit();
      } else {
          print $_SESSION['name'];
          print 'さんログイン中<br />';
          print '<br />';
      }
    ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport"
          content="width=device-width,user-scalable, initial-scale=1.0,
          maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>防火対象物管理アプリ</title>
</head>
<body>
<header>

</header>
</body>
</html>