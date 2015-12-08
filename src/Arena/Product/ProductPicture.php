<?php
namespace Arena\Product;
use Arena\Auth\AuthForm;

class ProductPicture
{
    /**
     * @var String
     */
    private $id;

    /**
     * @var String
     */
    private $url;

    /**
     * @var AuthForm
     */
    private $auth;

    /**
     * @return String
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param String $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param String $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return AuthForm
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param AuthForm $auth
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
    }

    /**
     * Method gets an request array for product image create in Arena.pl
     *
     * @return array
     */
    public function getRequestArray()
    {
        $request = [];
        $request['product_picture'] = [];
        $request['product_picture']['id'] = $this->getId();
        $request['product_picture']['url'] = $this->getUrl();
        $request['product_picture']['auth'] = [];
        $request['product_picture']['auth']['login'] = $this->getAuth()->getSeller();
        $request['product_picture']['auth']['apiKey'] = $this->getAuth()->getApiKey();

        return $request;
    }
}