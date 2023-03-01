
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
                <?php
                $db=$_GET['do']??'TITLE';
                $db=strtoupper($db);
                $ts=$$db->all();
?>
            <tbody>
                <tr>
                    <td width="45%" style="background-color: yellow;">頁尾版權資料:</td>
                    <td width="43%"><input type="text" name="text[]" id="text" value="<?=$ts[0]['text'];?>"></td>

                </tr>
            </tbody>
            <input type="hidden" name="table" value="<?=$db;?>">
            <input type="hidden" name="id[]" value="1">
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>