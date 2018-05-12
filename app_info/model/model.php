<?php
class Model
{

    public $id;
    
    var $table;
    

    public function read($fields = null)
    {
        if ($fields == null) {
            $fields = "*";
        }
        $db=mysqli_connect("localhost","root","","virifocus");
        $sql = "SELECT $fields FROM ".$this->table." WHERE id=" . $this->id;
        
        $req = mysqli_query($GLOBALS['db'],$sql) or die(mysqli_error()."<br/> =>".mysqli_query());
        $data = mysqli_fetch_assoc($req);
        
        foreach ($data as $k=>$v) {
            $this->$k=$v;
        }
    }

    static function load($name)
    {
        require ("$name.php");
        return new $name();
        
        ;
    }

    public function save($data)
    {
    if(isset($data['id']) && empty($data['id'])){
            $sql = "UPDATE" . $this->table . "SET";
            foreach ($data as $k => $v) {
                if($k!="id"){
                    $sql.="$k='$v',";
                    }
            $sql = substr($sql, 0, - 1);
            $sql = "WHERE id=" . $data["id"];
            
        }
    }
        else{
            $sql = "INSERT INTO" . $this->table . "(";
            
            unset($data["id"]);
            foreach ($data as $k => $v) {
                $sql.="$k,";}
                
                $sql = substr($sql, 0, - 1);
                $sql.=") VALUES(";
                foreach ($data as $v) {
                    $sql.="'$v',";}
                    
                $sql = substr($sql, 0, - 1);
                $sql = ")";
                
            }
        mysqli_query($sql) or die(mysqli_error()."<br/> =>".mysqli_query());
        if(!isset($data["id"])){
            
            $this->id=msqli_insert_id();
        }
        else{
            $this->id=$data["id"];
        }
    
}
