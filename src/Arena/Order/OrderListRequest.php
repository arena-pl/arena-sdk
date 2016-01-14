<?php
namespace Arena\Order;

use Arena\Auth\AuthForm;
use GuzzleHttp\Client;

class OrderListRequest
{
    // URL to fetch order list
    const URL = 'api/sellers/orders/%s/gets.json';

    /**
     * @param $page
     * @return string
     */
    private function prepareUri($page)
    {
        if (true === is_null($page)) {
            $page = (string)1;
        }

        return GATEWAY . sprintf(self::URL, $page);
    }

    /**
     * Method to get orders list from Arena.pl
     *
     * @param AuthForm $auth
     * @param null|integer $page
     * @return \stdClass[]
     */
    public function getOrderList(AuthForm $auth, $page = null)
    {
        $uri = $this->prepareUri($page);
        $client = new Client();

        $r = $client->request('POST', $uri, [
            'json' => $auth->getRequestArray(),
            'debug' => false
        ]);
        return json_decode($r->getBody()->getContents());
    }
}