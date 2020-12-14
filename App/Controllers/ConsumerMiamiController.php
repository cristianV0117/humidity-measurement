<?php
/**
 * @author Cristian Camilo Vasquez Osorio
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Controllers/ConsumerController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Core/Response.php';
final class ConsumerMiamiController extends ConsumerController
{
    use Response;

    private $miami;

    public function __construct()
    {
        parent::__construct();
        $this->miami = array('location' => 'miami', 'format' => 'json');
    }

    public function fetch()
    {
        $ch = curl_init();
        curl_setopt_array($ch, $this->getOptions($this->miami));
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);
        (!empty($data))
                    ? self::responseData(array("location" => $data->location->city, "temperature" => $data->current_observation->condition->temperature , "humidity" => $data->current_observation->atmosphere->humidity), false) 
                    : self::responseData('Ha ocurrido un error', true);
    }

    public function __destruct()
    {
        $this->miami = null;
    }
}
(new ConsumerMiamiController())->fetch();