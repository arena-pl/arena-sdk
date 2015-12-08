<?php
namespace Arena\Auth;

class AuthForm
{
    /**
     * @var String
     */
    private $seller;

    /**
     * @var String
     */
    private $apiKey;

    /**
     * @param null|String $seller
     * @param null|String $apiKey
     */
    public function __construct($seller = null, $apiKey = null)
    {
        $this->seller = $seller;
        $this->apiKey = $apiKey;
    }

    /**
     * Method to get an auth array for arena requests
     *
     * @return array
     */
    public function getRequestArray()
    {
        $request = [];
        $request['auth'] = [];
        $request['auth']['login'] = $this->getSeller();
        $request['auth']['apiKey'] = $this->getApiKey();

        return ($request);
    }

    /**
     * @return String
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * @param String $seller
     */
    public function setSeller($seller)
    {
        $this->seller = $seller;
    }

    /**
     * @return String
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param String $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }


}
