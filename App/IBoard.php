<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 19:51
 */

namespace App;


interface IBoard
{
    public function __construct($grades);
    public function getScore();
    public function getResponse();
}