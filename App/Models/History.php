<?php
/**
 * @author Cristian Camilo Vasquez Osorio
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/Core/BaseQuery.php';
class History extends BaseQuery
{
    private $data = array();
    
    public function __set($name, $value)
	{
        $this->data[$name] = $value;
	}
	
	public function __get($name)
	{
        return $this->data[$name];
    }
    
    protected function getHistory()
    {
        $query = $this->query("SELECT * FROM historial");
        return ($query['response']->execute())
                                        ? array("error" => false, "data" => $query['response']->fetchAll())
                                        : array("error" => true, "data" => $query['response']->errorInfo());
    }

    protected function saveHistory()
    {
        $query = $this->query("INSERT INTO historial (miami, ohio, newYork, fecha) VALUES (:miami, :ohio, :newYork, CURRENT_TIMESTAMP)");
        $query['response']->bindParam(':miami', $this->data['miami'], PDO::PARAM_STR);
        $query['response']->bindParam(':ohio', $this->data['ohio'], PDO::PARAM_STR);
        $query['response']->bindParam(':newYork', $this->data['newYork'], PDO::PARAM_STR);
        return ($query['response']->execute())
                                ? array("error" => false, "data" => $query['lastId']->lastInsertId())
                                : array("error" => true, "data" => $query['response']->errorInfo());
    }
}