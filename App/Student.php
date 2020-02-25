<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.02.20
 * Time: 18:35
 */

namespace App;

use PDO;


class Student
{
    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $studentId
     * @return array
     * @throws \Exception
     */
    public function find($studentId)
    {
        if(empty($studentId)){
            throw new \Exception('Missing student id', 404);
        }
        $query =
            "SELECT 
                students.id as id, students.name as name,
                grades.grade as grade,
                board.boarType as boardType
            FROM students
            LEFT JOIN grades
            ON students.id = grades.studentId
            LEFT JOIN board 
            ON students.id = board.studentId
            WHERE students.id = :studentId;";

        $statement = $this->connection->prepare( $query );
        $statement->bindParam(':studentId', $studentId);
        $statement->execute();

        if($statement->rowCount() == 0){
          throw new \Exception('Student not found', 404);
        }
        $studentData = [
            'id'        => null,
            'name'      => null,
            'boardType' => null,
            'grades'    => [],
        ];
        while($row = $statement->fetch(PDO::FETCH_ASSOC)){
            $studentData['id'] = $row['id'];
            $studentData['name'] = $row['name'];
            $studentData['boardType'] = $row['boardType'];
            if (!empty($row['grade'])) {
                $studentData['grades'][] = [
                    'grade' => $row['grade'],
                ];
            }
        }
        return $studentData;
    }

}