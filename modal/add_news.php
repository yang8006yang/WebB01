<h1 class="cent">新增最新消息資料</h1>
<hr>
<form action="./api/add.php" method="post">
    <div>最新消息資料 : <textarea name="text" id="" cols="30" rows="10"></textarea></div>
    <input type="hidden" name="table" value="NEWS">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</form>