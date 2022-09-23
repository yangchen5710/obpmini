<?php

namespace Ycstar\Obpmini\Traits;

trait User
{
    public function getAccessToken(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'getAccessToken', $params);
    }

    public function getUserCreditScore(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'uc.getUserCreditScore', $params);
    }

    public function getUserNicknameAndAvatar(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'uc.getUserNicknameAndAvatar', $params);
    }

    public function getUserIDCardAndName(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'uc.getUserIDCardAndName', $params);
    }

    public function getUserPhoneNumber(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'uc.getUserPhoneNumber', $params);
    }

    public function h5MMSetUserAuthCode(array $params)
    {
        return $this->callPostApi($this->miniAppH5Url, 'H5-mpps-mpm.api.setUserAuthCode', $params);
    }

    public function h5MMGetAuthContractContext(array $params)
    {
        return $this->callPostApi($this->miniAppH5Url, 'H5-mpps-mpm.api.getAuthContractContext', $params);
    }
}
