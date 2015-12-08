<?php
namespace Arena\Product;
use Arena\Auth\AuthForm;

class ProductAttribute
{
    /**
     * @var String
     */
    private $id;

    /**
     * @var String
     */
    private $name;

    /**
     * @var String
     */
    private $value;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param String $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return String
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param String $value
     */
    public function setValue($value)
    {
        $this->value = $value;
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
        $request['product_attribute'] = [];
        $request['product_attribute']['id'] = $this->getId();
        $request['product_attribute']['name'] = $this->getName();
        $request['product_attribute']['value'] = $this->getValue();
        $request['product_attribute']['auth'] = [];
        $request['product_attribute']['auth']['login'] = $this->getAuth()->getSeller();
        $request['product_attribute']['auth']['apiKey'] = $this->getAuth()->getApiKey();

        return $request;
    }
}