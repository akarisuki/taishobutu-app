<?php
ini_set('display_errors', 1);
    

//ヘッダーを読み込み
require_once '/home/ubuntu/public_html/taishobutu_app/common/header.php';
//政令別表の配列 $appendix_arrayを読み込む
require_once '/home/ubuntu/public_html/taishobutu_app/common/bettpiyo_array.php';

//変数で受け取る
//それからそれぞれバリデーションする 対象：用途区分、対象物名、
//ガチガチにはバリデーションしない。
//用途区分についてのバリデーション　例選択しない場合の
$error = [];

$post = $_POST;

$appendix = (int)$post['appendix'];

$taishobutu_name = $post['taishobutu_name'];

$taishobutu_address = $post['taishobutu_address'];

$taishobutu_tel = $post['taishobutu_tel'];

$concern_name = $post['concern_name'];

$concern_tel = $post['concern_tel'];

$total_area = (double)$post['total_area'];



if($appendix === 0){
  $error[] = '用途区分を選択して下さい。';
}

if($taishobutu_name === ''){
  $error[] = '対象物名が入力されていません。';
}

if(count($error) > 0){
  foreach($error as $value){
    print '・'.$value. '<br>';
  }
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<form>';
} else {
  //非番の日に実装する。
  print '用途区分:'.$appendix_array[$appendix].'<br>';
  print '対象物名:'.$taishobutu_name.'<br>';
  print '対象物所在地:'.$taishobutu_address.'<br>';
  print '対象物連絡先:'.$taishobutu_tel.'<br>';
  print '関係者名:'.$concern_name.'<br>';
  print '関係者連絡先:'.$concern_tel.'<br>';          
  print '延べ面積:'.$total_area.'<br>';
  print '<form method="post" action="taishobutu_done.php">';
  print'<input type="hidden" name="appendix" value="'.$appendix.'">';
  print'<input type="hidden" name="taishobutu_name" value="'.$taishobutu_name.'">';
  print'<input type="hidden" name="taishobutu_address" value="' .$taishobutu_address.'">';
  print'<input type="hidden" name="taishobutu_tel" value="' .$taishobutu_tel.'">';
  print'<input type="hidden" name="concern_name" value="' .$concern_name.'">';
  print'<input type="hidden" name="concern_tel" value="' .$concern_tel.'">';
  print'<input type="hidden" name="total_area" value="' .$total_area.'">';
  print'登録してもよろしいですか？';
  print'<input type="submit" value="OK">';
  print'<input type="button" onclick="history.back()"value="戻る">';
  print'</form>';
}



?>






</body>
</html>