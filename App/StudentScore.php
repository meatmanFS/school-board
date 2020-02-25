<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 19:35
 */

namespace App;


class StudentScore
{
    protected $studentData = [];
    protected $board;

    public function __construct(BoardService $boardService)
    {
        $this->setBoard($boardService->getBoard());
        $this->studentData = $boardService->getUserData();
    }

    protected function setBoard(IBoard $board)
    {
        $this->board = $board;
    }

    public function getScoreData()
    {
        return array_merge($this->studentData, $this->board->getScore());
    }

    public function getResponse()
    {
        return $this->board->getResponse();
    }

}