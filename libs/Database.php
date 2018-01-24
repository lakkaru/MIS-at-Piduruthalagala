<?php

class Database extends PDO {

//connection for database
    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
    }

    /**
     * selecting data from db
     * @param string $sqlAn SQL string
     * @param array $array parameters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_NAMED) {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    /**
     * inserting data to db
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data) {
        ksort($data);
        $fieldNames = implode(' , ', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        $sth = $this->prepare("INSERT INTO $table ($fieldNames)  VALUES ($fieldValues) ");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $dbResult = $sth->execute();
        if ($dbResult) {
            $message = array('success' => "true");
            return $message;
        } else {
            $message = array('error' => "error");
            return $message;
        }
    }

    /**
     * updating data in a db
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the where query part
     */
    public function update($table, $data, $where) {
        ksort($data);
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetail = rtrim($fieldDetails, ',');
        $sth = $this->prepare("UPDATE $table SET $fieldDetail WHERE $where");
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        $result = $sth->execute();
        if ($result) {
            $message = array('success' => "true");
            return $message;
        } else {
            $message = array('error' => "true");
            return $message;
        }
    }

    /**
     * delete
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected rows
     */
    public function delete($table, $where, $limit = 1) {
        $result = $this->exec("DELETE FROM $table  WHERE $where LIMIT $limit");
        if ($result) {
            $message = array('success' => "true");
            return $message;
        } else {
            $message = array('error' => "true");
            return $message;
        }
    }

}
