<?php

namespace App\Core\Service;

use App\Core\Repository\SlideRepository;
use App\Core\Repository\StoreInfoRepository;
use App\Core\Repository\StoreProductCategoryRepository;
use App\Core\Repository\StoreProductRepository;

class StoreFullInfoService
{
    private StoreService $storeService;
    private StoreInfoRepository $storeInfoRepository;
    private StoreProductCategoryRepository $storeProductCategoryRepository;
    private StoreProductRepository $storeProductRepository;
    private SlideRepository $slideRepository;

    public function getFullInfo()
    {
        $storeId = $this->storeService->getStoreId();
        $storeInfo = $this->storeInfoRepository->find($storeId);
        if (!$storeInfo) return null;
        return [
            'info' => $storeInfo,
            'productCategories' => $this->storeProductCategoryRepository->findBy(['storeId' => $storeId]),
            'products' => $this->storeProductRepository->findBy(['storeId' => $storeId]),
            'slides' => $this->slideRepository->findBy(['storeId' => $storeId]),
        ];
    }

    /**
     * @required
     * @param StoreService $storeService
     */
    public function setStoreService(StoreService $storeService): void
    {
        $this->storeService = $storeService;
    }

    /**
     * @required
     * @param StoreInfoRepository $storeInfoRepository
     */
    public function setStoreInfoRepository(StoreInfoRepository $storeInfoRepository): void
    {
        $this->storeInfoRepository = $storeInfoRepository;
    }

    /**
     * @required
     * @param StoreProductCategoryRepository $storeProductCategoryRepository
     */
    public function setStoreProductCategoryRepository(StoreProductCategoryRepository $storeProductCategoryRepository): void
    {
        $this->storeProductCategoryRepository = $storeProductCategoryRepository;
    }

    /**
     * @required
     * @param StoreProductRepository $storeProductRepository
     */
    public function setStoreProductRepository(StoreProductRepository $storeProductRepository): void
    {
        $this->storeProductRepository = $storeProductRepository;
    }

    /**
     * @required
     * @param SlideRepository $slideRepository
     */
    public function setSlideRepository(SlideRepository $slideRepository): void
    {
        $this->slideRepository = $slideRepository;
    }
}