<?php

namespace App\API\Controller;

use App\API\Service\Parse1cService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Parse1cController
 * @package App\API\Controller
 * @Route("/api/parse-1c")
 */
class Parse1cController extends AbstractController
{
    /**
     * @Route("/parse-uploaded")
     * @param Parse1cService $parse1cService
     * @return Response
     * @throws Exception
     */
    public function parseUploaded(Parse1cService $parse1cService): Response
    {
        return $this->json($parse1cService->parse($this->getDoctrine()->getManager()));
    }
}