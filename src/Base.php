<?php

namespace Ycstar\Obpmini;

//require_once '../vendor/autoload.php';

use Rtgm\sm\RtSm2;
use Rtgm\sm\RtSm4;
use GuzzleHttp\Client;
use Ycstar\Obpmini\Exceptions\InvalidArgumentException;

class Base
{
    /**
     * 商户配置
     * @var DataArray
     */
    protected $config;

    /**
     * 当前请求数据
     * @var DataArray
     */
    protected $params;

    /**
     * 请求域名
     */
    protected $domain = 'https://openapi.pingan.com.cn/obp';

    /**
    * Obpmini constructor.
    * @param array $options
    */
    public function __construct(array $options)
    {
        if (empty($options['appid'])) {
            throw new InvalidArgumentException("Missing Config -- [appid]");
        }
        if (empty($options['secret_key'])) {
            throw new InvalidArgumentException("Missing Config -- [secret_key]");
        }
        if (empty($options['public_key'])) {
            throw new InvalidArgumentException("Missing Config -- [public_key]");
        }
        if (empty($options['private_key'])) {
            throw new InvalidArgumentException("Missing Config -- [private_key]");
        }
        $this->config = new DataArray($options);

        $this->params = new DataArray([
            'appid'     => $this->config->get('appid'),
        ]);
    }

    protected function callPostApi($url, string $method, array $data)
    {
        $timestamp = $this->getMircoTime();
        $requestID = $this->setRequestId($timestamp);
        $content = $this->setBizContent($data);
        $params = [
            "appId"        => $this->config->get('appid'),
            "method"       => $method,
            "requestId"    => $requestID,
            "signType"     => 'SM2',
            "encryptType"  => 'SM4',
            "timestamp"    => $timestamp,
            "bizContent"   => $content,
        ];
        $sign = $this->setSign($params);
        $params['sign'] = $sign;
        ksort($params);
        $client = new Client();
        $response = $client->post($url, ['json' => $params])->getBody()->getContents();
        $rs = json_decode($response, true);
        if (isset($rs['responseCode']) && $rs['responseCode'] != '000000') {
            throw new InvalidArgumentException($rs['responseMsg']);
        }
        $strParam = $this->getSignContent(['bizResponse' => $rs['bizResponse']]);
        $sm2 = new RtSm2('base64');
        $verify = $sm2->verifySign($strParam, $rs['sign'], $this->config->get('public_key'));
        if (!$verify) {
            throw new InvalidArgumentException('验签错误');
        }
        // 解密
        $sm4 = new RtSm4(hex2bin($this->config->get('secret_key')));
        $bizContent = $sm4->decrypt($rs['bizResponse'], 'sm4-ecb', '', 'base64');
        $result = json_decode($bizContent, true);

        if ($result['responseCode'] != '000000') {
            throw new InvalidArgumentException($result['responseMsg']);
        }
        return $result;
    }

    /**
     * 获取13位时间戳
     */
    private function getMircoTime()
    {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (string) sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return $msectime;
    }

    /**
     *  bizContent sm4加密
     */
    private function setBizContent($data)
    {
        $jsonParam = json_encode($data, JSON_HEX_QUOT);
        $sm4 = new RtSm4(hex2bin($this->config->get('secret_key')));
        $rs = $sm4->encrypt($jsonParam, 'sm4-ecb', '', 'base64');
        return $rs;
    }

    /**
     *  requestId 加密配置
     *  $requestId = sha1(appId + Math.random() + 时间戳) 40位
     *  Math.random() 16位
     *  时间戳  13位
     */
    private function setRequestId($timestamp)
    {
        $ran = "0." . rand(0, 9999999).rand(0, 9999999);
        $str = $this->config->get('appid').$ran.$timestamp;
        return sha1($str, false);
    }

    private function setSign($param)
    {
        $strParam = $this->getSignContent($param);
        $sm2 = new RtSm2('base64');
        $sign = $sm2->doSign($strParam, $this->config->get('private_key'));
        return $sign;
    }

    /**
     * 数组转换为拼接字段URL
     * @param $params array
     * @return string
     */
    private function getSignContent($params)
    {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {
                // 转换成目标字符集
                $v = $this->characet($v, "UTF-8");

                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset($k, $v);
        return $stringToBeSigned;
    }

    private function checkEmpty($value)
    {
        if (!isset($value)) {
            return true;
        }
        if ($value === null) {
            return true;
        }
        if (trim($value) === "") {
            return true;
        }
        return false;
    }

    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    private function characet($data, $targetCharset)
    {
        if (!empty($data)) {
            $fileType = "UTF-8";
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }
}
