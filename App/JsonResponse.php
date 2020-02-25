<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 19:08
 */

namespace App;


class JsonResponse implements IResponse
{

    public function send($code, $data)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code($code);
        echo json_encode($data);
        die();
    }
}