<?php
/**
 * Created by IntelliJ IDEA.
 * User: sabau
 * Date: 19/03/17
 * Time: 11.30
 */

namespace interview;


use PDO;
use PDOException;

class DB
{
    private $host      = "localhost";
    private $user      = "interview";
    private $pass      = "interview";
    private $dbname    = "interview";

    private $dbh;
    private $error;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
            // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    /**
     * @return PDO
     */
    public function getDbh(): PDO
    {
        return $this->dbh;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @return bool
     */
    public function hasError(): bool
    {
        return isset($this->error);
    }
}