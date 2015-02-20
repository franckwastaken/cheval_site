<?php
//require_once 'core/init.php';


class DB {

    private  static  $_instance = null;
    private  $_pdo,
            $query,
            $_error = false,
            $_results,
            $_count = 0;

    private function __construct()
    {
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=cheval_site', 'root', '' );
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if(!isset(self::$_instance))
        {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = array())
    {
        $this->_error = false;
        if($this->query = $this->_pdo->prepare($sql))
        {
            $x = 1;
            if(count($params))
            {
                foreach($params as $param)
                {
                    $this->query->bindValue($x, $param);
                    $x++;
                }
            }

            if($this->query->execute())
            {
                $this->_results = $this->query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;

    }

    public function action($action, $table, $where = array())
    {
        if(count($where) === 3)
        {
            $operators = array('=', '>', '<', '>=', '<=');

            $field          = $where[0];
            $operator       = $where[1];
            $value          = $where[2];

            if(in_array($operator, $operators))
            {
                $sql = "{$action}  FROM {$table} WHERE {$field} {$operator} ?";
                if(!$this->query($sql, array($value))->error())
                {
                    return $this;
                }
            }
        }
        return false;
    }

    public function get($table, $where)
    {
        return $this->action('SELECT * ', $table, $where );
    }

    public function delete($table, $where)
    {
        return $this->action('DELETE', $table, $where );
    }

    public function results()
    {
        return $this->_results;
    }

    //get first result
    public function first()
    {
        return $this->results()[0];
    }

    public function insert($table, $fields = array())
    {

        $keys = array_keys($fields);
        $values = '';
        $x = 1;

        foreach($fields as $field)
        {
            $values .= '?';
            if($x < count($fields))
            {
                $values .= ',';
            }
            $x++;
        }

       // die($values);

        $sql = "INSERT INTO {$table} (`" .  implode('`, `', $keys) . "`) VALUES ({$values})  ";

        if(!$this->query($sql, $fields)->error())
        {
            return true;
        }
       // print_r($sql);
       // die();
        return false;
    }

    public function error()
    {
        return $this->_error;
    }

    public function count()
    {
        return $this->_count;
    }

    public function update($table, $id, $fields)
    {
        $set = '';
        $x = 1;

        foreach($fields as $name => $value)
        {
            $set .= "{$name} = ?";
            if($x < count($fields))
            {
                $set .= ', ';
            }
            $x++;
        }

        //die($set);

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id} ";

        //echo $sql;
       // die($sql);

        if(!$this->query($sql, $fields)->error())
        {
            return true;
        }

        return false;


    }



}

