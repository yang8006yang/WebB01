<h1 class="cent">新增主選單</h1>
<hr>
<form action="./api/add.php" method="post" >
    <div>
        主選單名稱:
        <input type="text" name="text" id="text">
    </div>
    <div>
        主選單連結網址:
        <input type="text" name="href" id="href">
    </div>
    <input type="hidden" name="table" value="MENU">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</form>