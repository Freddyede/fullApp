<?php

namespace App\Services;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ApiServices
{

    private Response $response;

    public function __construct() {
        $this->response = new Response();
    }

    public function setApiStatusCode(int $statusCode): void
    {
        $this->response->setStatusCode($statusCode);
    }

    public function setHeaders($arrayHeaders = []): void
    {
        foreach ($arrayHeaders as $k => $v){
            $this->response->headers->set($k, $v);
        }
    }

    public function getApiStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    /**
     * @throws Exception
     */
    public function setContent($response = [], $apiContent = false): void
    {
        $apiContent
            ?
                $this->response->setContent(json_encode($response))
            :
            throw new Exception("Activate apiContent key");
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}