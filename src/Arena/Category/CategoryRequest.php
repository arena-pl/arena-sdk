<?php
namespace Arena\Category;

use Arena\Auth\AuthForm;
use Arena\Exception\AuthException;
use GuzzleHttp\Client;

class CategoryRequest
{
    // URL to fetch category tree
    const URL = 'api/categories/categories/%s/trees.json';

    /**
     * @param $categoryId
     * @return string
     */
    private function prepareUri($categoryId)
    {
        if (true === is_null($categoryId)) {
            $categoryId = (string)0;
        }

       return GATEWAY . sprintf(self::URL, $categoryId);
    }

    /**
     * Method to get category tree elements from Arena.pl
     *
     * @param AuthForm $auth
     * @param null $categoryId
     * @return \stdClass[]
     */
    public function getCategoryTree(AuthForm $auth, $categoryId = null)
    {
        $uri = $this->prepareUri($categoryId);
        $client = new Client();

        $r = $client->request('POST', $uri, [
            'json' => $auth->getRequestArray(),
            'debug' => false
        ]);

//        var_dump(json_decode($r->getBody()->getContents()));
        return json_decode($r->getBody()->getContents());
    }
}