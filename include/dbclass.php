<?php
require_once('koneksi.php');

abstract class DBclassAbstarct{
    protected $dbfunc;
    protected $query;
    protected function select($data){
        $this->query .= $data." ";
    }
    protected function from($data){
        $this->query .= $data." ";
    }
    
}

class DBClass extends DBclassAbstarct{

    protected $dbfunc;

    protected $query;

    public function __construct(){
        $this->dbfunc = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if($this->dbfunc->connect_error){
            die("Connection Mysqli Failed ".$this->dbfunc->connect_error);
        }
    }

    public function select($data = '*'){
        $this->query .= "SELECT ".$data." ";
    }

    public function from($from){
        $this->query .= "FROM ".$from." ";
    }

    public function where($ar = []){
        $query = "";
        $is_key = array();
        $i = 0;
        foreach($ar as $key => $value){
            if(!preg_match("/where/i",strtolower($query))){
                $query .= "where ";
            }
            if(is_array($ar[$key])){
                $z = $ar[$key][0]." ".$ar[$key][1]." '".$ar[$key][2]."' ";
                array_push($is_key,$z);
            } else {
                if($i>=3){
                    $query .= "'".$value."' ";
                } else {
                    $query .= $value." ";
                }
                $i++;
            }
        }
        if(count($is_key) > 0){
            $query .= implode("and ",$is_key);
        }
        $this->query .= $query;
    }

    public function groupby($coll = null){
        $this->query .= " GROUP BY ".$coll." ";
    }

    public function get(){
        $data = $this->dbfunc->query($this->query);
        if($data){
            if($data->num_rows > 0){
                $result = [];
                while ($row = $data->fetch_assoc()) {
                    $result[] = $row;
                }
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function insert($table, $isi = array()){
        $query = "INSERT INTO $table ";
        $keys = "(";
        $values = "(";
        $i = 0;
        foreach($isi as $key => $value){
            if($i==(count($isi)-1)){
                $keys .= '`'.$key.'` ';
                $values .= "'".$value."' ";
            } else {
                $keys .= '`'.$key.'`, ';
                $values .= "'".$value."', ";
            }
            $i++;
        }
        $keys .= ')';
        $values .= ')';
        $insert = $this->dbfunc->query($query.$keys." VALUES ".$values);
        if($insert){
            return true;
        } else {
            return false;
        }
    }

    public function delete(){
        $this->query = "DELETE ";
    }

    public function update($table = null){
        $this->query = "UPDATE ".$table." ";
    }

    public function set($array = array()){
        $query = "SET ";
        $i = 0;
        foreach($array as $key => $value){
            if($i==(count($array)-1)){
                $query .= $key." = '".$value."' ";
            } else {
                $query .= $key." = '".$value."', ";
            }
            $i++;
        }
        $this->query .= $query;
    }

    /**
     * execute function will run query.
     * @return bool
     */
    public function execute(): bool{
        $query = $this->dbfunc->query($this->query);
        if($query){
            return true;
        } else {
            return false;
        }
    }

    public function __destruct(){
        $this->dbfunc->close();
        $this->query = "";
    }

}
