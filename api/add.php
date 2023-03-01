<?php
include_once "base.php";

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}
$table=$_POST['table'];
unset($_POST['table']);

$$table->save($_POST);
to("../back.php?do=".strtolower($table));