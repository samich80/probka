<?php

namespace App\Core\Service;

use Exception;

class StoreService
{
    private int $storeId;

    /**
     * @return int
     * @throws Exception
     */
    public function getStoreId(): int
    {
        if (!$this->storeId) {
            $this->storeId = (int)getenv('STORE_ID');
            if (!$this->storeId) {
                throw new Exception("STORE_ID should be initialized");
            }
        }
        return $this->storeId;
    }

    /**
     * @required
     * @param int $storeId
     */
    public function setStoreId(int $storeId = 0): void
    {
        $this->storeId = $storeId;
    }
}