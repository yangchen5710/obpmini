<?php

namespace Ycstar\Obpmini\Traits;

trait Account
{
    public function getDynamicProductPoolList(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'brop.pop.shelf.service.dynamicProductPool.getList', $params);
    }

    public function getRecommendList(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'brop-pop-shelf-service.recommend.getRecommendList', $params);
    }

    public function batchProductDetail(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'brop.pop.shelf.service.product.batchDetail', $params);
    }

    public function getTrackProfitDetail(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'brop.pop.shelf.service.getTrackProfitDetail', $params);
    }
}
