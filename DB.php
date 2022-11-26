<?php

class DB {
    private $host = 'localhost';
    private $dbname = 'exel';
    private $username = 'root';
    private $password = 'root';
    private $db;

    public function __construct(){
        $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    }

    public function query($sql, $params = []){
        $stmt = $this->db->prepare($sql);
        if ( !empty($params) ) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll($table, $sql = '', $params = []){
        return $this->query("SELECT * FROM $table" . $sql, $params);
    }

    public function getRow($table, $sql = '', $params = []){
        $result = $this->query("SELECT * FROM $table" . $sql, $params);
        return $result[0];
    }

    public function insert($values = [], $table){
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("SET CHARACTER SET utf8");
        $ins = [];
        foreach ($values as $field => $v)
            $ins[] = ':' . $field;
        $ins = implode(',', $ins);
        $fields = implode(',', array_keys($values));
        $sql = "INSERT INTO $table ($fields) VALUES ($ins)";
        $sth =  $this->db->prepare($sql);
        foreach ($values as $f => $v) {
            $sth->bindValue(':' . $f, $v);
        }
        $sth->execute();
    }

    public function update($data, $sql){
        $stmt= $this->db->prepare($sql);
        $stmt->execute($data);
    }
}