<?php

namespace Ycstar\Obpmini\Traits;

trait Common
{
    public function fetchMorePannelItems(array $params)
    {
        return $this->callPostApi($this->miniAppH5Url, 'H5-mpps-mpm.api.fetchMorePannelItems', $params);
    }

    public function queryAuthority(array $params)
    {
        return $this->callPostApi($this->miniAppH5Url, 'H5-mpps-mpm.api.queryAuthority', $params);
    }

    public function getUserAuthAddressInfo(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'uc.getUserAuthAddressInfo', $params);
    }
}
