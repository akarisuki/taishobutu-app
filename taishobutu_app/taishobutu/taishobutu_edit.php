<?php
ini_set('display_errors', 1);
    

require_once '/home/ubuntu/public_html/taishobutu_app/common/header.php';

require_once '/home/ubuntu/public_html/taishobutu_app/common/db_connect.php';

$code = $_GET['code'];
$sql = "SELECT * FROM taishobutu_main WHERE code = :code";
$stmt = $db_host->prepare($sql);
$stmt->bindValue(':code', $code, PDO::PARAM_INT);
$stmt->execute();
$edit_data = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<h1>防火対象物の項目を修正</h1>
<form method="post"action="taishobutu_edit_check.php">
    <table>
        <label for="code" >番号:<?php print $edit_data['code'];?></label><br/>
        <input type="hidden" name="code" value="<?php print $edit_data['code'];?>">
        <label for="appendix">用途区分</label>
        <?php require_once   '/home/ubuntu/public_html/taishobutu_app/common/bettpiyo_array.php'; ?>
        <?php require_once   '/home/ubuntu/public_html/taishobutu_app/common/bettpiyo_select_edit.php'; ?>
        <label for="taishobutu_name">対象物名</label>
        <input type="text" name="taishobutu_name" value="<?php print $edit_data['taishobutu_name'];?>">
        <label for="taishobutu_address">対象物所在地</label>
        <input type="text" name="taishobutu_address" value="<?php print $edit_data['taishobutu_address'];?>">
        <label for="taihobutu_tel">対象物連絡先</label>
        <input type="text" name="taishobutu_tel" value="<?php print $edit_data['taishobutu_tel'];?>">
        <label for="concern_name">関係者名</label>
        <input type="text" name="concern_name" value="<?php print $edit_data['concern_name'];?>">
       <th><label for="concern_tel">関係者連絡先</label></th>
        <td><input type="text" name="concern_tel" value="<?php print $edit_data['concern_tel'];?>"></td>
       <th><label>延べ面積</label></th>
        <td><input type="text" name="total_area" value="<?php print $edit_data['total_area'];?>">㎡</td>       
        
    </table>
    <input type="submit"value="修正する">
</form>