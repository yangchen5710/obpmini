<?php

namespace Ycstar\Obpmini\Traits;

trait Order
{
    public function createPerPay(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'pay.prepay', $params);
    }

    public function createPayRefund(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'pay.refund', $params);
    }

    public function smallPayRefund(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'smallPay.apiRefund', $params);
    }

    public function queryUserCreditScoreV2(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'uc.queryUserCreditScore.v2', $params);
    }

    public function doPay(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'pay.doPay', $params);
    }

    public function smallPayQrySignDetailByOpenId(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'smallPay.qrySignDetailByOpenId', $params);
    }

    public function queryPayOrderDetails(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'pay.queryPayOrderDetails', $params);
    }

    public function smallDoPay(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'smallPay.doPay', $params);
    }

    public function refundQuery(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'pay.refundQuery', $params);
    }

    public function cancelPrepayOrder(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'pay.cancelPrepayOrder', $params);
    }

    public function smallPayFreeSignBySignId(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'smallPay.freeSignBySignId', $params);
    }

    public function smallPayFreeSignPay(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'smallPay.freeSignPay', $params);
    }

    public function smallPayQrySignPay(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'smallPay.qrySignPay', $params);
    }

    public function smallPayRefundQuery(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'smallPay.apiRefundQuery', $params);
    }

    public function smallPayQueryPayInfo(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'smallPay.queryPayInfo', $params);
    }

    public function iBankPayCancelPrepay(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'obp-api-ibank-pay.cancelPrepay', $params);
    }

    public function smallPayQrySignByOpenId(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'smallPay.qrySignByOpenId', $params);
    }
}
