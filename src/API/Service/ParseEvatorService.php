<?php

namespace App\API\Service;

use App\API\Entity\Parse\ProductCategoryToStoreForParse;
use App\API\Entity\Parse\ProductToStoreForParse;
use App\API\Repository\Parse\ProductCategoryToStoreForParseRepository;
use App\API\Repository\Parse\ProductToStoreForParseRepository;
use App\Core\Entity\Product;
use App\Core\Entity\ProductCategory;
use App\Core\Entity\ProductCategoryToStore;
use App\Core\Repository\ProductCategoryRepository;
use App\Core\Repository\ProductRepository;
use App\Core\Service\StoreService;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class ParseEvatorService
{
    private StoreService $storeService;
    private ProductCategoryRepository $productCategoryRepository;
    private ProductCategoryToStoreForParseRepository $productCategoryToStoreForParseRepository;
    private ProductRepository $productRepository;
    private ProductToStoreForParseRepository $productToStoreForParseRepository;
    private ObjectManager $em;

    public function parse(ObjectManager $em)
    {
        $this->em = $em;
        $storeId = $this->storeService->getStoreId();
        $parsedCount = 0;
        try {
            $filesPath = getcwd() . "/../upload/parse/evator/{$storeId}";

            $finder = new Finder();
            $finder->files()->in($filesPath);

            if (!$finder->hasResults()) {
                return ['status' => 'failed', 'errorMessage' => 'Uploaded files don\'t exist.'];
            }

            foreach ($finder as $file) {
                if (preg_match('/categories/', $file->getFilename())) {
                    $this->parseCategories($storeId, $file);
                } else if (preg_match('/products/', $file->getFilename())) {
                    $this->parseProducts($storeId, $file);
                }
            }
        } catch (\Exception $e) {
            throw $e;
            return ['status' => 'failed', 'errorMessage' => $e->getMessage()];
        }
        if ($parsedCount === 0) {
            return ['status' => 'failed', 'errorMessage' => 'There are no parsable files'];
        }
        return ['status' => 'done'];
    }

    private function parseCategories(int $storeId, SplFileInfo $file): bool
    {
        $rows = explode("\n", $file->getContents());
        if (empty($rows)) {
            return false;
        }
        foreach ($rows as $row) {
            if (empty(trim($row))) continue;
            $this->parseCategory($storeId, trim($row));
        }
        return true;
    }

    private function parseCategory($storeId, $parsedRow)
    {
        $rawCategories = json_decode($parsedRow, true)['content'];
        foreach ($rawCategories as $rawCategory) {
            $savedCategoryToStore = $this->productCategoryToStoreForParseRepository->findOneBy(['storeId' => $storeId, 'evatorId' => $rawCategory['id']]);
            if(empty($savedCategoryToStore)){
                $this->createCategory($storeId, $rawCategory);
            } else {
                $this->updateCategory($rawCategory, $savedCategoryToStore);
            }
        }

    }

    private function createCategory($storeId, $rawCategory)
    {
        $productCategory = new ProductCategory();
        $productCategory->setTitle($rawCategory['name']);
        $this->em->persist($productCategory);
        $this->em->flush();

        $productCategoryToStoreForParse = new ProductCategoryToStoreForParse();

        $productCategoryToStoreForParse->setProductCategoryId($productCategory->getId());
        $productCategoryToStoreForParse->setStoreId($storeId);
        $productCategoryToStoreForParse->setEvatorId($rawCategory['id']);
        $this->em->persist($productCategoryToStoreForParse);
        $this->em->flush();
    }

    private function updateCategory($rawCategory, $savedCategoryToStore)
    {

        $productCategory = $this->productCategoryRepository->find($savedCategoryToStore->getProductCategoryId());

        $productCategory->setTitle($rawCategory['name']);
        $this->em->persist($productCategory);
        $this->em->flush();
    }

    private function parseProducts(int $storeId, $file)
    {
        $rows = explode("\n", $file->getContents());
        if (empty($rows)) {
            return false;
        }
        foreach ($rows as $row) {
            if (empty(trim($row))) continue;
            $this->parseProduct($storeId, trim($row));
        }
        return true;
    }

    private function parseProduct($storeId, $parsedRow)
    {

        $rawProducts = json_decode($parsedRow, true)['content'];
        foreach ($rawProducts as $rawProduct) {
            $savedProductToStore = $this->productToStoreForParseRepository->findOneBy(['storeId' => $storeId, 'evatorId' => $rawProduct['id']]);
            if(empty($savedProductToStore)){
                $this->createProduct($storeId, $rawProduct);
            } else {
                $this->updateProduct($storeId, $rawProduct, $savedProductToStore);
            }
        }

    }

    private function createProduct($storeId, $rawProduct)
    {
        $category = $this->productCategoryToStoreForParseRepository->findOneBy(['storeId' => $storeId, 'evatorId' => $rawProduct['parent_id']]);
        $product = new Product();
        $product->setTitle($rawProduct['name']);
        $product->setDefaultPrice($rawProduct['price']);
        $product->setCategoryId($category->getProductCategoryId());
        $this->em->persist($product);
        $this->em->flush();

        $productToStoreForParse = new ProductToStoreForParse();

        $productToStoreForParse->setProductId($product->getId());
        $productToStoreForParse->setStoreId($storeId);
        $productToStoreForParse->setEvatorId($rawProduct['id']);
        $productToStoreForParse->setPrice($rawProduct['price']);
        $this->em->persist($productToStoreForParse);
        $this->em->flush();
    }

    private function updateProduct($storeId, $rawProduct, $savedProductToStore)
    {

        $product = $this->productRepository->find($savedProductToStore->getProductId());
        $category = $this->productCategoryToStoreForParseRepository->findOneBy(['storeId' => $storeId, 'evatorId' => $rawProduct['parent_id']]);

        $product->setTitle($rawProduct['name']);
        $product->setDefaultPrice($rawProduct['price']);
        $product->setCategoryId($category->getProductCategoryId());
        $this->em->persist($product);
        $this->em->flush();
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
     * @param ProductCategoryRepository $productCategoryRepository
     */
    public function setProductCategoryRepository(ProductCategoryRepository $productCategoryRepository): void
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    /**
     * @required
     * @param ProductRepository $productRepository
     */
    public function setProductRepository(ProductRepository $productRepository): void
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @required
     * @param ProductCategoryToStoreForParseRepository $productCategoryToStoreForParseRepository
     */
    public function setProductCategoryToStoreForParseRepository(ProductCategoryToStoreForParseRepository $productCategoryToStoreForParseRepository): void
    {
        $this->productCategoryToStoreForParseRepository = $productCategoryToStoreForParseRepository;
    }

    /**
     * @required
     * @param ProductToStoreForParseRepository $productToStoreForParseRepository
     */
    public function setProductToStoreForParseRepository(ProductToStoreForParseRepository $productToStoreForParseRepository): void
    {
        $this->productToStoreForParseRepository = $productToStoreForParseRepository;
    }


}