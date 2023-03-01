<?php
session_start();
date_default_timezone_set("Asia/Taipei");

class DB{
    protected $dsn='mysql:host=localhost;charset=utf8;dbname=db13';
    protected $table='';
    protected $pdo='';

    public function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new pdo($this->dsn,'root','');
    }
    private function arrayTOsql($array)
    {
        if(is_array($array)){
            foreach ($array as $key => $val) {
                $tmp[]="`$key`='$val'";
            }
        }
        return $tmp;
    }
    public function all(...$arg)
    {
        $sql="SELECT * FROM `$this->table` ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp=$this->arrayTOsql($arg[0]);
                $sql=$sql." WHERE " .join("&&",$tmp);
            }else{
                $sql=$sql.$arg[0];
            }
        }

        if(isset($arg[1])){
                $sql=$sql. $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function find($id)
    {
        $sql="SELECT * FROM `$this->table` ";
        if(is_array($id)){
            $tmp=$this->arrayTOsql($id);
            $sql=$sql." WHERE " .join("&&",$tmp);
        }else{
            $sql=$sql." WHERE `id` = $id";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public function del($id)
    {
        $sql="DELETE FROM `$this->table` ";
        if(is_array($id)){
            $tmp=$this->arrayTOsql($id);
            $sql=$sql." WHERE " .join("&&",$tmp);
        }else{
            $sql=$sql." WHERE `id` = $id";
        }
        return $this->pdo->exec($sql);
    }

    public function save($array)        
    {  
        if(isset($array['id'])){
            $id=$array['id'];
            unset($array['id']);
            $tmp=$this->arrayTOsql($array);
            $sql="UPDATE `$this->table` SET  ". join(",",$tmp)."WHERE `id`=$id";
        }else{
            $col=array_keys($array);
            $sql="INSERT INTO `$this->table` (`". join("`,`",$col)."`) VALUES ('".join("','",$array)."')";
        }
        return $this->pdo->exec($sql);
    }

    public function math($math,...$arg)
    {
        switch ($math) {
            case 'count':
                $sql="SELECT count(*) FROM `$this->table` ";
                if(isset($arg[0])){
                    $con=$arg[0];
                }
                break;
            
            default:
            $sql="SELECT $math($arg[0]) FROM `$this->table` ";
            if(isset($arg[1])){
                $con=$arg[1];
            }
                break;
        }
        if(isset($con)){
            if(is_array($con)){
                $tmp=$this->arrayTOsql($con);
                $sql=$sql." WHERE " .join("&&",$tmp);
            }else{
                $sql=$sql.$con;
            }
        }
        return $this->pdo->query($sql)->fetchColumn();
    }
    public function count(...$arg)
    {
        return $this->math('count',...$arg);
    }
    public function max(...$arg)
    {
        return $this->math('max',...$arg);
    }
    public function min(...$arg)
    {
        return $this->math('min',...$arg);
    }
    public function avg(...$arg)
    {
        return $this->math('avg',...$arg);
    }
    public function sum(...$arg)
    {
        return $this->math('sum',...$arg);
    }
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url){
    header("location:$url");
}

$TITLE=new DB('title');
$AD=new DB('ad');
$ADMIN=new DB('admin');
$IMG=new DB('img');
$MVIM=new DB('mvim');
$TOTAL=new DB('total');
$NEWS=new DB('news');
$BOT=new DB('bot');
$MENU=new DB('menu');

if(!isset($_SESSION['v'])){
    $_SESSION['v']=1;
    $t=$TOTAL->find(1);
    $t['text']+=1;
    $TOTAL->save($t);
}