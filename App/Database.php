<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 17:52
 */

namespace App;

use Exception;
use PDO;


class Database
{
    protected $host;
    protected $database;
    protected $user;
    protected $password;

    protected $connection;

    public function __construct($databaseConfig)
    {
        $this->host     = $databaseConfig['host'];
        $this->database = $databaseConfig['database'];
        $this->user     = $databaseConfig['user'];
        $this->password = $databaseConfig['password'];
    }

    /**
     * @return PDO
     * @throws Exception
     */
    public function getConnection(){

        $this->connection = null;

        try{
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
            $this->connection->exec("set names utf8");
        }catch(PDOException $exception){
            throw new Exception( "Connection error: " . $exception->getMessage());
        }

        return $this->connection;
    }
}