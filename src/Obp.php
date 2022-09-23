<?php

namespace Ycstar\Obpmini;

use Ycstar\Obpmini\Traits\Account;
use Ycstar\Obpmini\Traits\Common;
use Ycstar\Obpmini\Traits\Coupon;
use Ycstar\Obpmini\Traits\Credit;
use Ycstar\Obpmini\Traits\Order;
use Ycstar\Obpmini\Traits\Product;
use Ycstar\Obpmini\Traits\Until;
use Ycstar\Obpmini\Traits\User;

class Obp extends Base
{
    use Account, Common, Coupon, Credit, Order, Product, Until, User;

    /**
     * 请求地址(mini)
     */
    protected $miniAppUrl;

    /**
     * 请求地址(gateway)
     */
    protected $gateWayUrl;

    /**
     * 请求地址(miniapph5)
     */
    protected $miniAppH5Url;

    /**
     * 子域名
     */
    protected $subDomains = [
        'miniapp'   =>'/api/miniapp.do',
        'gateway'   =>'/api/gateway.do',
        'miniapph5' =>'/h5/miniapph5.do',
    ];

    public function __construct(array $options)
    {
        parent::__construct($options);
        $this->miniAppUrl = $this->domain . $this->subDomains['miniapp'];
        $this->gateWayUrl = $this->domain . $this->subDomains['gateway'];
        $this->miniAppH5Url = $this->domain . $this->subDomains['miniapph5'];
    }
}
