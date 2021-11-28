<?php

/** 
 * Databasa ORM
 */
class DB
{
    private static $database = null;
    /** @var Databasa*/
    private $pdo,
        $sql,
        $results,
        $error = false,
        $count = 0;

    //databse connection
    private function __construct() //var_dump(Config::get('mysql'));
    {
        try {
            $this->pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'), Config::get('mysql/options'));
            // echo "U lidh me batabase";
        } catch (PDOException $e) {
            die("Probleme me database" . $e->getMessage());
        }
    }

    //get batabase only one time
    /** Lidhu me database vetem një here
     * 
     *  @return MainDatabase */
    public static function getDB() //DB::getDB();
    {
        if (!isset(self::$database)) {
            self::$database = new DB();
        }
        return self::$database;
    }

    /**
     * query function 
     * @return "SELECT * from x where y = ?", ? = zs
     * */
    public function sql(String $sql, array $executes = array()) //DB::getDB()->sql("SELECT * from users where username = ?", array('AlpetG'))
    {
        $this->error = false;
        if ($this->sql = $this->pdo->prepare($sql)) {
            // print_r($executes);
            $x = 1;
            if (count($executes)) {
                foreach ($executes as $execute) {
                    $this->sql->bindValue($x, $execute);
                    // $this->sql->bindParam($x, $execute); 
                    $x++;
                }
            }
            if ($this->sql->execute()) {
                $this->results = $this->sql->fetchAll(PDO::FETCH_OBJ);
                $this->count = $this->sql->rowCount();
            } else {
                $this->error = true;
            }
        }
        return $this;
    }

    /**
     * @param String $action
     * @return "SELECT * from x where z 'operator' z"
     */
    public function action(String $action, String $table, array $where = array()) //DB::getDB()->get('SELCET *','users', array('username ' , '=' , 'AlpetG') );
    {
        if (count($where) === 3) {
            $allow = array('=', '<', '>', '>=', '=>');

            $filed = $where[0];
            $operator = $where[1];
            $value = $where[2];

            //in_array — Checks if a value exists in an array
            if (in_array($operator, $allow)) {
                $sql = "{$action} FROM {$table} WHERE {$filed} {$operator} ?";

                //use sql($sql,array) to run
                if (!$this->sql($sql, array($value))->error()) {
                    return $this;
                }
            }
            return false;
        }
    }

    /** Selcet data */
    public function get(String $tabel, array $where) //DB::getDB()->get('users', array('username ' , '=' , 'AlpetG'));
    {
        return $this->action("SELECT *", $tabel, $where);
    }

    /** Delete Data */
    public function delete(String $tabel, $where)
    {
        return $this->action("DELETE ", $tabel, $where);
    }

    /** Insert Data */
    public function insert(String $table, array $fields = array())
    {
        if (count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;

            //fix ", " and "?" for sql
            foreach ($fields as $field) {
                $values .= "?";
                if ($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            } // VALUES (?, ?)

            $sql = "INSERT INTO $table (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
            //INSERT INTO users (`emri`, `mbiemri`)                 VALUES (?, ?)

            // echo $sql;
            if (!$this->sql($sql, $fields)->error()) {
                return true;
            }
        }
        return false;
    }


    /** Update Data */
    public function update(String $table, int $id, array $fields = array()) //DB::getDB()->update('users', 65, array( 'emri' => 'Alpet', 'mbiemri' => 'Gexha', 'username' => 'AlpetG23', 'password' => '123456789' ));
    {
        $set = ' ';
        $x = 1;

        foreach ($fields as $name => $value) {
            $set .= "{$name} = ?";
            if ($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }
        // die($set);

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id} ";
        echo $sql;

        if (!$this->sql($sql, $fields)->error()) {
            return true;
        }

        return false;
    }


    /** get results */
    public function results()
    {
        return $this->results;
    }

    /** get firts result */
    public function firstResult()
    {
        return $this->results()[0];
    }

    /** get all error */
    public function error(): String
    {
        return $this->error;
    }

    /** get Count */
    public function count(): int
    {
        return $this->count;
    }
}
