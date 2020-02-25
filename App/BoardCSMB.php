<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 19:46
 */

namespace App;


class BoardCSMB implements IBoard
{

    const PASS_GRADE = 8;
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
        return ($this->getHighGrade() >= self::PASS_GRADE) ? 'Pass' : 'Fail';
    }

    protected function getAverage()
    {
        return array_sum(array_column($this->grades, 'grade')) / count($this->grades);
    }

    protected function getHighGrade()
    {
        usort($this->grades, [$this, 'sortGrades']);
        if (count($this->grades) > 0) {
            return $this->grades[0];
        }
        return 0;
    }

    public function sortGrades($a, $b)
    {
        if($a['grade'] == $b['grade']){
            return 0;
        }
        return ($a['grade'] > $b['grade']) ? -1 : 1;
    }

    public function getResponse()
    {
        return new XmlResponse();
    }
}