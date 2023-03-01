<h1 class="cent">新增管理者帳號</h1>
<hr>
<form action="./api/add.php" method="post">
    <div>帳號 : <input type="text" name="acc" id="acc"></div>
    <div>密碼 : <input type="text" name="pw" id="pw"></div>
    <input type="hidden" name="table" value="ADMIN">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</form>