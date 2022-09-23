<?php

namespace Ycstar\Obpmini\Traits;

trait Credit
{
    public function queryUrpCustLabels(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'URP-DOMAIN-vest.queryCustLabels', $params);
    }

    public function rightsInfoSyncMini(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'rightsInfoSyncMini', $params);
    }

    public function queryUrpMemberId(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'URP-DOMAIN-vest.queryMemberId', $params);
    }

    public function unifiedRecordGroupInfo(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'ccms-ma.ma-pm-mgm.unified.record.group.info', $params);
    }

    public function unifiedGenerateFlowIdForXX(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'ccms-ma.ma-pm-mgm.unified.generateFlowIdForXX', $params);
    }

    public function unifiedCheckCustomerGroup(array $params)
    {
        return $this->callPostApi($this->miniAppH5Url, 'ccms-ma.ma-pm-mgm.unified.checkCustomerGroup', $params);
    }

    public function unifiedStandardData(array $params)
    {
        return $this->callPostApi($this->miniAppH5Url, 'ccms-ma.ma-pm-mgm.unified.standard.data', $params);
    }

    public function unifiedRecommendDetailForXX(array $params)
    {
        return $this->callPostApi($this->miniAppH5Url, 'ccms-ma.ma-pm-mgm.unified.recommendDetailForXX', $params);
    }

    public function unifiedSubmit(array $params)
    {
        return $this->callPostApi($this->miniAppH5Url, 'ccms-ma.ma-pm-mgm.unified.submit', $params);
    }
}
