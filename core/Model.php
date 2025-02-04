<?php
class Model
{
    protected $conn;
    public function __construct()
    {
        $this->conn = Db::getInstance()->getConnection();
    }

    public function create($table, $data)
    {
        $key = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($key) VALUES ($placeholders)";
        // echo "<br>$sql<br>";
        try {
            $stmt = $this->conn->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
                // echo "{$key}: {$value}<br>";
            }

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "[CREATE] " . $e->getMessage();
            return false;
        }
    }
    public function read($table, $conditions = "")
    {
        if (!isset($this->conn)) {
            return [];
        }
        $sql = "SELECT * FROM $table" . ($conditions ? " WHERE $conditions" : "");
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "[READ] " . $e->getMessage();
            return [];
        }
    }
    public function update($table, $data, $conditions = "")
    {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");
        $sql = "UPDATE $table SET $set WHERE $conditions";
        echo $sql;
        try {
            $stmt = $this->conn->prepare($sql);
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "[UPDATE] " . $e->getMessage();
            return false;
        }
    }
    public function delete($table, $conditions = "")
    {
        $sql = "DELETE FROM $table WHERE $conditions";
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "[DELETE] " . $e->getMessage();
        }
    }

}