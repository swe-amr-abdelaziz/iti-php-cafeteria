<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

class Database
{
    private static $connection = null;

    private static function connect_pdo()
    {
        $dsn = "mysql:dbname=".DB_NAME.";host=".HOST.";port=".PORT.";";
        try {
            self::$connection = new PDO($dsn, USER, PASSWORD);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    static function connect()
    {
        if (!isset(self::$connection)) {
            self::connect_pdo();
        }
        return self::$connection;
    }

    static function insert($table, $record)
    {
        self::connect();
        try {
            $keys = array_keys($record);
            $placeholders = implode(',', array_fill(0, count($keys), '?'));

            $query = "INSERT INTO {$table} (" . implode(',', $keys) . ") VALUES ({$placeholders})";
            $stmt = self::$connection->prepare($query);

            $stmt->execute(array_values($record));
            return $stmt->rowCount();
        } catch (Exception $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    static function select($table)
    {
        self::connect();
        try {
            $query = "SELECT * FROM {$table};";
            $stmt = self::$connection->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    static function select_one($table, $id)
    {
        self::connect();
        try {
            $query = "SELECT * FROM {$table} WHERE id = {$id};";
            $stmt = self::$connection->prepare($query);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            return false;
        }
    }

    static function selectByEmail($table, $email)
    {
        self::connect();
        try {
            $query = "SELECT * FROM {$table} WHERE email = '{$email}';";
            $stmt = self::$connection->prepare($query);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    static function update($table, $id, $record)
    {
        self::connect();
        try {
            $keys = array_keys($record);
            $placeholders = implode('=?,', $keys) . '=?';

            $query = "UPDATE {$table} SET {$placeholders} WHERE id = ?";
            $stmt = self::$connection->prepare($query);

            $values = array_values($record);
            $values[] = $id;

            $stmt->execute($values);
            return $stmt->rowCount();
        } catch (Exception $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    static function delete($table, $id)
    {
        self::connect();
        try {
            $query = "DELETE FROM {$table} WHERE id = :id";
            $stmt = self::$connection->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (Exception $e) {
            echo 'Error: '. $e->getMessage();
        }
    }
}
