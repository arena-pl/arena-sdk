<?php
namespace Arena\Product;
use Arena\Auth\AuthForm;

class ProductStatus
{
    /**
     * @var String
     */
    private $id;

    /**
     * @var Integer
     */
    private $quantity;

    /**
     * @var Integer
     */
    private $availability;

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
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param int $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

    /**
     * Method gets an request array for product create or update in Arena.pl
     *
     * @return array
     */
    public function getRequestArray()
    {
        $request = [];
        $request['product_status'] = [];
        $request['product_status']['id'] = $this->getId();
        $request['product_status']['quantity'] = $this->getQuantity();
        $request['product_status']['availability'] = $this->getAvailability();
        $request['product_status']['auth'] = [];
        $request['product_status']['auth']['login'] = $this->getAuth()->getSeller();
        $request['product_status']['auth']['apiKey'] = $this->getAuth()->getApiKey();

        return $request;
    }
}