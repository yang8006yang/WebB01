<h1 class="cent">新增動畫圖片</h1>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <div>
        動畫圖片:
        <input type="file" name="img" id="img">
    </div>
    <input type="hidden" name="table" value="MVIM">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</form>