<?php
include_once "../api/base.php";
?>
<h1 class="cent">編輯次選單</h1>
<hr>
<form action="./api/edit.php" method="post">
    <table id="stable">
        <tr>
            <td>
                次選單名稱
            </td>
            <td>
                次選單連結網址
            </td>
            <td>刪除</td>
        </tr>
        <?php
        $ts = $MENU->all(['parent' => $_GET['id']]);
        foreach ($ts as $t) {
        ?>
            <tr class="cent">
                <td width="25%"><input type="text" name="text[]" value="<?= $t['text']; ?>"></td>
                <td width="23%"><input type="text" name="href[]" value="<?= $t['href']; ?>"></td>
                <td width="7%"><input type="checkbox" name="del[]" id="del" value="<?= $t['id']; ?>"></td>
                <input type="hidden" name="id[]" value="<?= $t['id']; ?>">
            </tr>
        <?php
        }
        ?>
    </table>
        <input type="hidden" name="parent" value="<?= $_GET['id']; ?>">
        <input type="hidden" name="table" value="MENU">
        <input type="submit" value="確認">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="sub()">
</form>
<script>
    function sub() {
        $html=`<tr class="cent">
                <td width="25%"><input type="text" name="add_text[]" ></td>
                <td width="23%"><input type="text" name="add_href[]"></td>
                <td width="7%"></td>
            </tr>`
        $("#stable").append($html)
    }
</script>