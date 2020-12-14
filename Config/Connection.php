<?php
/**
 * @author Cristian Camilo Vasquez Osorio
 * La conexion se realizará de forma nativa mediante el objeto de conexion PDO
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/Config/DataBase.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Core/Response.php';
abstract class Connection implements DataBase
{
    use Response;
    private $mysqlHost = "mysql:host=";
    private $dbName    = ";dbname=";
    private $host;
    private $dataBase;
    private $username;
    private $password;
    protected $connection;
    protected $query;

    public function __construct()
    {
        $this->host     = self::DATABASE["HOST"];
        $this->dataBase = self::DATABASE["DATABASE"];
        $this->username = self::DATABASE["USER"];
        $this->password = self::DATABASE["PASSWORD"];
        $this->connection();
    }


    private function connection()
    {
        try {
            $this->connection = new PDO($this->mysqlHost . $this->host . $this->dbName . $this->dataBase, $this->username, $this->password);
        } catch (Exception $e) {
            self::responseData('Ha ocurrido un error con la conexion', true);
        }
        
    }

    abstract protected function query($query);
}