<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 19:06
 */

namespace App;


class ResponseHandler
{
    protected $response;

    public function __construct(IResponse $response)
    {
        $this->response = $response;
    }

    public function sendResponse($code, $data)
    {
        $this->response->send($code, $data);
    }

}