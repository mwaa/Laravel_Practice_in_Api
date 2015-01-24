<?php
/**
 * Created by PhpStorm.
 * User: Mwaa
 * Date: 1/24/2015
 * Time: 2:29 PM
 */

use Illuminate\Http\Response as IlluminateResponse;

class ApiController extends \BaseController {

    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


    public function respondNotFound($message ='Not Found')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public  function respond($data,$headers=[])
    {
        return Response::json($data,$this->getStatusCode(),$headers);
    }

    public  function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * @return $this
     */
    public function responseCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([
            'message' => $message
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondFailedValidation($message)
    {
        return $this->setStatusCode(422)
            ->respondWithError($message);
    }
    /**
     * @param $lessons
     * @return \Illuminate\Http\JsonResponse
     */
    protected  function respondWithPagination(Paginator $lessons, $data)
    {
        $data = array_merge($data,[
            'paginator' => [
                'total_count' => $lessons->getTotal(),
                'total_page' => $lessons->getTotal() / $lessons->getPerPage(),
                'current_page' => $lessons->getCurrentPage(),
                'limit' => $lessons->getPerPage()

            ]
        ]);
        return $this->respond($data);
    }
}