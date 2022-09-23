<?php

namespace Ycstar\Obpmini\Traits;

trait Coupon
{
    public function getOrderStatus(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'obp-mpps-openapi.api.getOrderStatus', $params);
    }

    public function createOrder4Suppliers(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'obp-mpps-openapi.api.createOrder4Suppliers', $params);
    }

    public function changeOrderStatus(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'obp-mpps-openapi.api.changeOrderStatus', $params);
    }
}
