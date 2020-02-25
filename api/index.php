<?php
use App\Database;
use App\Student;
use App\ResponseHandler;
use App\JsonResponse;

require __DIR__.'/../vendor/autoload.php';
$config = require __DIR__.'/../config.php';


try{
    $database = new Database($config['database']);
    $student = new Student($database->getConnection());
    $studentId = $_GET['student'] ?? null;
    $studentData = $student->find($studentId);
} catch (Exception $e){
    $responseHandler = new ResponseHandler(new JsonResponse());
    $responseHandler->sendResponse($e->getCode(), [
        'error' => $e->getMessage(),
    ]);
}

$responseHandler = new ResponseHandler(new JsonResponse());
$responseHandler->sendResponse(200, $studentData);

