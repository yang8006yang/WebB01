
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="65%">校園映像資料圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $db=$_GET['do']??'TITLE';
                $db=strtoupper($db);
                
                $div=3;
                $all=$$db->count();
                $now=$_GET['p']??1;
                $start=($now-1)*$div;
                $pages=ceil($all/$div);
                
                $ts=$$db->all(" LIMIT $start,$div");
                foreach ($ts as $t ) {
                    ?>
                <tr class="cent">
                    <td width="65%"><img src="./upload/<?=$t['img'];?>" alt=""  width="100px"></td>
                    <td width="7%"><input type="checkbox" name="sh[]" id="sh" value="<?=$t['id'];?>" <?=($t['sh']==1)?'checked':'';?>></td>
                    <td width="7%"><input type="checkbox" name="del[]" id="del" value="<?=$t['id'];?>"></td>
                    <td><input type="button" onclick="op('#cover','#cvr','./modal/update_<?=$_GET['do']?>.php?id=<?=$t['id'];?>')" value="更新動畫"></td>
                    <input type="hidden" name="id[]" value="<?=$t['id'];?>">
                </tr>
                    <?php
                }
                ?>
            </tbody>
            <input type="hidden" name="table" value="<?=$db;?>">
        </table>
        <div class="cent">

            <?php
        if(($now-1)>0){
            $prev=$now-1;
            echo "<a href='?do=img&p=$prev'> < </a>";
        }
        for ($i=1; $i <= $pages; $i++) { 
            $n=($i==$now)?'red':'black';
            echo "<a href='?do=img&p=$i' class='$n'> $i </a>";
        }
        if(($now+1)<=$pages){
            $next=$now+1;
            echo "<a href='?do=img&p=$next'> > </a>";
        }
        ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_<?=$_GET['do']?>.php')" value="新增校園映像圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>