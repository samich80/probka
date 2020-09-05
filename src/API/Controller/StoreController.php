<?php

namespace App\API\Controller;

use App\Core\Repository\StoreInfoRepository;
use App\Core\Service\StoreFullInfoService;
use App\Core\Service\StoreService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StoreController
 * @package App\API\Controller
 * @Route("/api/store")
 */
class StoreController extends AbstractController
{
    /**
     * @Route("/info")
     * @param StoreFullInfoService $storeFullInfoService
     * @return Response
     */
    public function info(StoreFullInfoService $storeFullInfoService): Response
    {
        $fullStoreInfo = $storeFullInfoService->getFullInfo();
        if (empty($fullStoreInfo)) {
            return new Response("No data found", Response::HTTP_NOT_FOUND, ['content-type' => 'text/plain']);
        }
        return $this->json($fullStoreInfo);
    }
}