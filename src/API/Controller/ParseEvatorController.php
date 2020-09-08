<?php

namespace App\API\Controller;

use App\API\Service\ParseEvatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StoreController
 * @package App\API\Controller
 * @Route("/api/parse-evator")
 */
class ParseEvatorController extends AbstractController
{
//    /**
//     * @Route("/parse-uploaded")
//     * @param ParseEvatorService $parseEvatorService
//     * @return Response
//     */
//    public function parseUploaded(ParseEvatorService $parseEvatorService): Response
//    {
//        return  $this->json($parseEvatorService->parse($this->getDoctrine()->getManager()));
//    }
}