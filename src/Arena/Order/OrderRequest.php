<?php
namespace Arena\Order;

use Arena\Auth\AuthForm;
use GuzzleHttp\Client;

class OrderRequest
{
    const URL_GET_ONE = 'api/sellers/orders/%s/gets/ones.json';

    /**
     * @param string $orderId
     * @return string
     */
    private function prepareUriForGetOrder($orderId)
    {
        return GATEWAY . sprintf(self::URL_GET_ONE, $orderId);
    }
    /**
     * Method to get single order from Arena.pl
     *
     * @param AuthForm $auth
     * @param null|integer $orderId
     * @return \stdClass[]
     */
    public function getOrderSingle(AuthForm $auth, $orderId)
    {
        $uri = $this->prepareUriForGetOrder($orderId);
        $client = new Client();

        $r = $client->request('POST', $uri, [
            'json' => $auth->getRequestArray(),
            'debug' => true
        ]);
        return json_decode($r->getBody()->getContents());
    }
}