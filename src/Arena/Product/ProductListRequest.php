<?php
namespace Arena\Product;

use Arena\Auth\AuthForm;
use GuzzleHttp\Client;

class ProductListRequest
{
    // URL to fetch product list
    const URL = 'api/products/products/%s/gets.json';

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
     * Method to get category tree elements from Arena.pl
     *
     * @param AuthForm $auth
     * @param null|integer $page
     * @return \stdClass[]
     */
    public function getProductList(AuthForm $auth, $page = null)
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