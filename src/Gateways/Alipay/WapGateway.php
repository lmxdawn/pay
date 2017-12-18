<?php

namespace Lmxdawn\Pay\Gateways\Alipay;

class WapGateway extends Alipay
{
    /**
     * get method config.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @version 2017-08-10
     *
     * @return string [description]
     */
    protected function getMethod()
    {
        return 'alipay.trade.wap.pay';
    }

    /**
     * get productCode config.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @return string
     */
    protected function getProductCode()
    {
        return 'QUICK_WAP_WAY';
    }

    /**
     * pay a order.
     *
     * @author yansongda <me@yansongda.cn>
     *
     * @param array $config_biz
     *
     * @return string
     */
    public function pay(array $config_biz = [])
    {
        parent::pay($config_biz);

        if (!empty($config_biz['httpMethod']) && $config_biz['httpMethod'] == 'GET'){

            //拼接GET请求串
            $requestUrl = $this->gateway."?".http_build_query($this->config);

            return $requestUrl;
        }

        return $this->buildPayHtml();
    }

}
