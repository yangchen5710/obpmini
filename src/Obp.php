<?php

namespace Ycstar\Obpmini;

class Obp extends Base
{
    /**
     * 请求地址
     */
    protected $url;
    /**
     * 子域名
     */
    protected $subDomain = '/api/miniapp.do';

    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->url = $this->domain . $this->subDomain;
    }


    public function getAccessToken(array $params)
    {
        $method = 'getAccessToken';
        return $this->callPostApi($this->url, $method, $params);
    }

    public function createPerPay(array $params)
    {
        $method = 'pay.prepay';
        return $this->callPostApi($this->url, $method, $params);
    }
}
