<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 19:46
 */

namespace App;


class BoardCSM implements IBoard
{
    const PASS_GRADE = 7;
    protected $grades = [];
    public function __construct($grades)
    {
        $this->grades = $grades;
    }

    public function getScore()
    {
        return [
            'result'    => $this->getResult(),
            'average'   => $this->getAverage(),
            'grades'    => $this->grades,
        ];
    }

    protected function getResult()
    {
        return ($this->getAverage() >= self::PASS_GRADE) ? 'Pass' : 'Fail';
    }

    protected function getAverage()
    {
        return array_sum(array_column($this->grades, 'grade')) / count($this->grades);
    }

    public function getResponse()
    {
        return new JsonResponse();
    }
}