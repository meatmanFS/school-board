<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 19:43
 */

namespace App;


class BoardService
{
    protected $boardType = '';
    protected $studentData = [];

    public function __construct($studentData)
    {
        $this->studentData = $studentData;
        $this->boardType = $studentData['boardType'];
    }

    public function getUserData()
    {
        return [
            'id' => $this->studentData['id'],
            'name' => $this->studentData['name'],
        ];
    }

    public function getBoard(){
        $board = null;
        switch ($this->boardType) {
            case '1':
                $board = new BoardCSM($this->studentData['grades']);
                break;
            case '2':
                $board = new BoardCSMB($this->studentData['grades']);
                break;
        }
        return $board;
    }

}