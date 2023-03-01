<h1 class="cent">更新標題區圖片</h1>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
    <div>
        標題區圖片:
        <input type="file" name="img" id="img">
    </div>
    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
    <input type="hidden" name="table" value="TITLE">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</form>