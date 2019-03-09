<?php


class QueryBuilder {
    public $pdo = "";
    function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
    }

    function all($table) {
        $sql = "SELECT * FROM $table";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    function store($table, $data) {
        $keys = array_keys($data);
        $stringOfKeys = implode($keys,", ");
        $strKeysWithDots = ":" . implode($keys,", :");
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($strKeysWithDots)";
        echo '<pre>';
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data); //true || false


    }

    function showOne($table, $data) {

        $sql = "SELECT * FROM $table WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $data);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function update($table, $data) {
        $fields = "";
        foreach ($data as $key=>$value) {
            $fields .= $key . "=:" . $key . ",";
        }
        $fields = rtrim($fields, ",");
        $sql = "UPDATE $table SET $fields WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }

    function delete($table, $id) {
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
    }

    function getOneForData($table, $data) {
        $fields = "";
        foreach ($data as $key => $value) {
            $fields .= $key . "=:" . $key . " AND ";
        }
        $fields = rtrim($fields, "AND ");
        $sql = "SELECT * FROM $table WHERE $fields";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    function deleteForData($table,$data) {
        $user = $this->getOneForData($table,$data);
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement=$this->pdo->prepare($sql);
        $statement->bindParam(":id",$user["id"]);
        $statement->execute();
    }
}