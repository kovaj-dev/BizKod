<?php


namespace App\Libraries\Core;

use \PDO;
use \PDOStatement;
use \PDOException;
class Database
{
    /**
     * @var string
     */
    private  $host = HOST;

    /**
     * @var string
     */
    private $user = USER;
    /**
     * @var string
     */
    private $password = PASSWORD;
    /**
     * @var string
     */
    private $dbName = DBNAME;

    /**
     * @var PDO
     */
    private $con;

    /**
     * @var PDOStatement
     */
    private $stmt;



    public function __construct()
    {
        $dsn = sprintf("mysql:host=%s;dbname=%s", $this->host , $this->dbName);

        try {
            $this->con = new PDO($dsn,$this->user,$this->password,[
                PDO::ATTR_PERSISTENT => true ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_OBJ
            ]);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function query($sql)
    {
        $this->stmt = $this->con->prepare($sql);
    }

    public function bind($param,$value,$type = null)
    {
        if(is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function getResults()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    public function getResult()
    {
        $this->execute();
        return $this->stmt->fetch();
    }
    public function getRowCount()
    {
        return $this->stmt->rowCount();
    }

}