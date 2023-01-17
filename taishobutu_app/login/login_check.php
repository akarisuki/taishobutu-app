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
<?php
    try{
        ini_set('display_errors', 1);
        //require_once '/home/ubuntu/public_html/taishobutu_app/common/sanitize.php';
        require_once '/home/ubuntu/public_html/taishobutu_app/common/db_connect.php';

        

        session_start();

        
        $post = $_POST;

        $staff_name = $post['name'];
        $staff_pass = $post['pass'];

        $hash_pass = password_hash($staff_pass,PASSWORD_DEFAULT);

        $sql = 'SELECT * FROM firedept_staff WHERE staff_name = :staff_name';
        $stmt = $db_host->prepare($sql);
        $stmt->bindValue(':staff_name', $staff_name,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        var_dump($result);


        if(!empty($result)) {
            if(password_verify($staff_pass,$hash_pass)) {
                session_regenerate_id(true);
                $_SESSION['login'] = 1;
                $_SESSION['id'] = $result['id'];
                $_SESSION['name'] = $result['name'];

                header('Location: /home/ubuntu/public_html/taishobutu_app/taishobutu/taishobutu_index.php');
                exit;
            } else {
                print 'ユーザー名、またはパスワードが違います。';
                print '<input type="button" onclick="history.back()" value="戻る">';
            }

        }else {
            print 'ユーザー名、またはパスワードが違います。';
            print '<input type="button" onclick="history.back()" value="戻る">';
        }
    } catch (Exception $e) {
        print 'ただいま障害により大変ご迷惑をおかけしております。';

    }


    

    

?>

</body>
</html>