<?php

namespace Ycstar\Obpmini\Traits;

trait Product
{
    public function billInstallmentRepayApply(array $params)
    {
        return $this->callPostApi($this->gateWayUrl, 'distropl.max.billInstallmentRepayApply', $params);
    }
}
