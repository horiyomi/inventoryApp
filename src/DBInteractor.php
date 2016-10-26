<?php
/**
 * Created by PhpStorm.
 * User: dammy
 * Date: 10/23/16
 * Time: 9:16 PM
 */

namespace App;

use PDO;
use PDOException;

trait DBInteractor
{
    protected function dbConfig($key, $default = null)
    {
        $config = require __DIR__ . '/../config/db.php';

        return (! array_key_exists($key, $config)) ? $default : $config[$key];
    }


    protected function connect()
    {

        $host = $this->dbConfig("host");
        $dbName = $this->dbConfig("dbname");
        $driver = $this->dbConfig("driver");
        $username = $this->dbConfig("username");
        $password = $this->dbConfig("password");

        $dsn = "$driver:host=$host;dbname=$dbName";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

            return $pdo;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $sql
     * @param null $data
     * @return bool|string
     */
    protected function executeAction($sql, $data = null) // INSERT/UPDATE/DELETE
    {
        try {
            $STH = $this->db->prepare($sql);

            if ($data === null)
            {
                $STH->execute();
            }
            else {
                $STH->execute($data);
            }

            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $sql
     * @return array|string
     */
    protected function executeQuery($sql) //SELECT
    {
        try {

            $STH = $this->db->query($sql);

            $STH->setFetchMode(PDO::FETCH_ASSOC);

            $results = $STH->fetchAll();

            return count($results) == 1 ? $results[0] : $results;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}