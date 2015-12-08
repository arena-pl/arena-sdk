<?php
namespace Arena\Product;
use Arena\Auth\AuthForm;

class Product
{
    /**
     * @var String
     */
    private $id;

    /**
     * @var String
     */
    private $parent;

    /**
     * @var String
     */
    private $name;

    /**
     * @var String
     */
    private $description;

    /**
     * @var Integer
     */
    private $weight;

    /**
     * @var Integer
     */
    private $price;

    /**
     * @var String
     */
    private $category;

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
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param String $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param String $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return String
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param String $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
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
     * Method gets an request array for product create or update in Arena.pl
     *
     * @return array
     */
    public function getRequestArray()
    {
        $request = [];
        $request['product'] = [];
        $request['product']['id'] = $this->getId();
        $request['product']['parent'] = $this->getParent();
        $request['product']['category'] = $this->getCategory();
        $request['product']['name'] = $this->getName();
        $request['product']['description'] = $this->getDescription();
        $request['product']['weight'] = $this->getWeight();
        $request['product']['price'] = $this->getPrice();
        $request['product']['auth'] = [];
        $request['product']['auth']['login'] = $this->getAuth()->getSeller();
        $request['product']['auth']['apiKey'] = $this->getAuth()->getApiKey();

        return $request;
    }
}