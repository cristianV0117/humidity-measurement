<?php
/**
 * @author Cristian Camilo Vasquez Osorio
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/App/Models/History.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Core/Response.php';
class HistoryController extends History
{
    use Response;

    public function index()
    {
        $response = $this->getHistory();

        if ($response['error']) {
            self::responseData('Ha ocurrido un error', true);
        }

        self::responseData($response['data'], false);
    }

    public function store($post)
    {
        $this->miami = $post['miami'];
        $this->ohio = $post['ohio'];
        $this->newYork = $post['newYork'];
        $response = $this->saveHistory();
        
        if ($response['error']) {
            self::responseData('Ha ocurrido un error', true);
        }

        self::responseData($response['data'], false);
    }
}
$post = json_decode(file_get_contents('php://input') ?: '{}', true);
if (empty($post)) :
    (new HistoryController())->index();
else :
    (new HistoryController())->store($post);
endif;
