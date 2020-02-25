<?php

namespace App;

interface IResponse {
    public function send($code, $data);
}