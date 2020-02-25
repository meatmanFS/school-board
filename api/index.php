<?php
use App\Database;
use App\Student;
use App\ResponseHandler;
use App\JsonResponse;
use App\StudentScore;
use App\BoardService;

require __DIR__.'/../vendor/autoload.php';
$config = require __DIR__.'/../config.php';


try{
    $database = new Database($config['database']);
    $student = new Student($database->getConnection());
    $studentId = $_GET['student'] ?? null;
    $studentData = $student->find($studentId);
    $studentScore = new StudentScore(new BoardService($studentData));
    $responseHandler = new ResponseHandler($studentScore->getResponse());
    $responseHandler->sendResponse(200, $studentScore->getScoreData());
} catch (Exception $e){
    $responseHandler = new ResponseHandler(new JsonResponse());
    $responseHandler->sendResponse($e->getCode(), [
        'error' => $e->getMessage(),
    ]);
}


