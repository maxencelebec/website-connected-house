<?php

class Model
{

    public $id;
    var $table;

    function read($fields = null)
    {
        if ($fields == null) {
            $fields = "*";
        }
        $db = mysqli_connect("localhost", "root", "", "virifocus");
        $sql = "SELECT $fields FROM " . $this->table . " WHERE id=" . $this->id;
        
        $req=mysqli_query($GLOBALS['db'],$sql) or die(mysqli_error($GLOBALS['db']) . "<br/> =>" . mysqli_query($GLOBALS['db'],$sql)); // on revoie aussi la query qui a été faite pour débugger si besoin
        $data = mysqli_fetch_assoc($req);
        
        
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }
    }

    static function load($name) // petite fonction sympathique qui permet de charger le bon .php en fonction de la BDD que l'on veut importer/instancier.
    {
        require ("$name.php");
        return new $name();
        
        ;
    }

    function save($data)
    {
        if (isset($data['id']) && empty($data['id'])) {
            $sql = "UPDATE" . $this->table . "SET";
            foreach ($data as $k => $v) {
                if ($k != "id") {
                    $sql .= "$k='$v',";
                }
                $sql = substr($sql, 0, - 1);
                $sql = "WHERE id=" . $data["id"];
            }
        } else {
            $sql = "INSERT INTO" . $this->table . "(";
            
            unset($data["id"]);
            foreach ($data as $k => $v) {
                $sql .= "$k,";
            }
            
            $sql = substr($sql, 0, - 1);
            $sql .= ") VALUES(";
            foreach ($data as $v) {
                $sql .= "'$v',";
            }
            
            $sql = substr($sql, 0, - 1);
            $sql = ")";
        }
        mysqli_query($GLOBALS['db'],$sql) or die(mysqli_error($GLOBALS['db']) . "<br/> =>" . mysqli_query($GLOBALS['db'],$sql)); // on revoie aussi la query qui a été faite pour débugger si besoin
        if (! isset($data["id"])) {
            
            $this->id = msqli_insert_id();
        } else {
            $this->id = $data["id"];
        }
    }

    function find($data = array())
    {
        $condition = "1=1";
        $fields = "*";
        $limit = "";
        $order = "id DESC"; // DESC par défault, ASC si on veut modifier.
        
        if (isset($data["condition"])) {
            $condition = $data["condition"];
        }
        if (isset($data["fields"])) {
            $fields = $data["fields"];
        }
        if (isset($data["limit"])) {
            $limit = $data["limit"];
        }
        if (isset($data["order"])) {
            $order = $data["order"];
        }
        $sql = "SELECT $fields FROM ". $this->table." WHERE $condition ORDER BY $order $limit";
        $req=mysqli_query($GLOBALS['db'],$sql) or die(mysqli_error($GLOBALS['db']) . "<br/> =>" . mysqli_query($GLOBALS['db'],$sql)); // on revoie aussi la query qui a été faite pour débugger si besoin
        $d = array();
        while ($data = mysqli_fetch_assoc($req)) {
            $d[] = $data;
        }
        return $d;
    }
    
    function del($id=null) {
        if(id==null){$id=$this.id;}
        $sql="DELETE FROM".$this->table."WHERE id=$id";
        mysqli_query($GLOBALS['db'],$sql) or die(mysqli_error($GLOBALS['db']) . "<br/> =>" . mysqli_query($GLOBALS['db'],$sql)); // on revoie aussi la query qui a été faite pour débugger si besoin
        
    }
    
}

