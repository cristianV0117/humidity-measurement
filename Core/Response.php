<?php
/**
 * @author Cristian Camilo Vasquez Osorio.
 */
trait Response
{
    public static function responseData($response, $error)
    {
        header('Content-Type: application/json');
        echo json_encode(array('error' => $error, "data" => $response));
    }
}