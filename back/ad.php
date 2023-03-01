
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動態文字廣告管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="65%">動態文字廣告</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <!-- <td></td> -->
                </tr>
                <?php
                $db=$_GET['do']??'TITLE';
                $db=strtoupper($db);
                $ts=$$db->all();
                foreach ($ts as $t ) {
                    ?>
                <tr class="cent">
                    <td width="65%"><input type="text" name="text[]" value="<?=$t['text'];?>" style="width: 95%;"></td>
                    <td width="7%"><input type="checkbox" name="sh[]" id="sh" value="<?=$t['id'];?>" <?=($t['sh']==1)?'checked':'';?>></td>
                    <td width="7%"><input type="checkbox" name="del[]" id="del" value="<?=$t['id'];?>"></td>
                    <!-- <td><input type="button" onclick="op('#cover','#cvr','./modal/update_<?=$_GET['do']?>.php?id=<?=$t['id'];?>')" value="更新圖片"></td> -->
                    <input type="hidden" name="id[]" value="<?=$t['id'];?>">
                </tr>
                    <?php
                }
                ?>
            </tbody>
            <input type="hidden" name="table" value="<?=$db;?>">
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_<?=$_GET['do']?>.php')" value="新增網站標題圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>