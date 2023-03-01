<?php
include_once "base.php";

if($_POST['acc']=='admin' && $_POST['pw']==1234){
   to("../back.php"); 
}else{
    to("../index.php?do=login&e=1");
}