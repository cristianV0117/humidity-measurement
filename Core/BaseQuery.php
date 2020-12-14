<?php
/**
 * @author Cristian Camilo Vasquez Osorio
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/Config/Connection.php';
class BaseQuery extends Connection
{
    protected function query($query)
    {
        $this->connection->exec("SET CHARSET utf8");
		$this->query = $this->connection->prepare($query);
		return array('response' => $this->query,'lastId' => $this->connection);
    }
}