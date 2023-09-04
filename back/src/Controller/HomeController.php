<?php

namespace App\Controller;

use App\Services\ApiServices;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\{
    HttpFoundation\Response,
    Routing\Annotation\Route
};


#[Route('/api', name: 'api.')]
class HomeController extends AbstractController
{
    /**
     * @throws Exception
     */
    #[Route('/', name: 'index')]
    public function index(ApiServices $apiServices): Response
    {

        $apiServices->setHeaders(['Content-Type'=> 'application/json']);
        $apiServices->setApiStatusCode(Response::HTTP_OK);
        $apiServices->setContent(
                [
                    'message' => 'Welcome to your new controller!',
                    'path' => 'src/Controller/HomeController.php',
                    'status' => $apiServices->getApiStatusCode()
                ],
                true
            );
            return $apiServices->getResponse();
    }
}
