<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 19:08
 */

namespace App;

use Spatie\ArrayToXml\ArrayToXml;

class XmlResponse implements IResponse
{

    public function send($code, $data)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-type: text/xml; charset=utf-8");
        http_response_code($code);
        echo ArrayToXml::convert($data);
        die();
    }
}