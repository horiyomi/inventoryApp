<?php


namespace App;

class DB extends DBInteractor
{
    protected $db;

    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getAllData($tableName)
    {
        $sql = "SELECT * from " . $tableName;

        return $this->executeQuery($sql);
    }

    public function getAllDataInnerJoin($tableName, $otherTable, $condition, array $fields = ['*'])
    {
        $fields = convertToCommaSeparatedString($fields);

        $sql = "SELECT $fields FROM " . $tableName . " JOIN " . $otherTable . " ON " . $condition;

        return $this->executeQuery($sql);
    }

    public function getAllDataInnerJoinGroupBy($tableName, $otherTable, $condition, array $fields = ['*'], $groupBy)
    {
        $fields = convertToCommaSeparatedString($fields);

        $sql = "SELECT $fields FROM " . $tableName . " JOIN " . $otherTable . " ON " . $condition . ' GROUP BY ' . $groupBy;

        return $this->executeQuery($sql);
    }


    public function getAllDataInnerJoinWhereGroupBy($tableName, $otherTable, $condition, array $fields = ['*'], $where, $groupBy)
    {
        $fields = convertToCommaSeparatedString($fields);

        $sql = "SELECT $fields FROM " . $tableName . " JOIN " . $otherTable . " ON " . $condition . " WHERE " . $where . " GROUP BY " . $groupBy;

        return $this->executeQuery($sql);
    }


    public function getAllDataWhere($tableName, $condition)
    {
        $sql = "SELECT * from " . $tableName ." WHERE " . $condition;

        return $this->executeQuery($sql);
    }

    public function createData($tableName, array $data)
    {
        $fieldNames = array_keys($data);

        $fields = convertToCommaSeparatedString($fieldNames);

        $boundNames = array_map(function($name){
            return ":" . $name;
        }, $fieldNames);

        $fieldsValue = convertToCommaSeparatedString($boundNames);

        $sql = "INSERT INTO $tableName ($fields) value ($fieldsValue)";

        return $this->executeAction($sql, $data);
    }

    public function getRecord($tableName, $id)
    {
        return true;
    }

    public function updateData($tableName, $id, array $data, $key = 'id')
    {
        $fieldNames = array_map(function($datum, $key){
            return $key. '='.$datum;
        }, $data, array_keys($data));

        $values = convertToCommaSeparatedString($fieldNames);

        $sql = "UPDATE $tableName SET $values WHERE $key=$id";

        return $this->executeAction($sql);
    }
}
