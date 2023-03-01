<h1 class="cent">新增標題區圖片</h1>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <div>
        標題區圖片:
        <input type="file" name="img" id="img">
    </div>
    <div>標題區替代文字<input type="text" name="text" id="text"></div>
    <input type="hidden" name="table" value="TITLE">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</form>