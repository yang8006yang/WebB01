<h1 class="cent">新增校園映像圖片</h1>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <div>
        校園映像圖片:
        <input type="file" name="img" id="img">
    </div>
    <input type="hidden" name="table" value="IMG">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</form>