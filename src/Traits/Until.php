<?php

namespace Ycstar\Obpmini\Traits;

trait Until
{
    public function productShow(array $params)
    {
        return $this->callPostApi($this->miniAppUrl, 'product.show', $params);
    }
}
