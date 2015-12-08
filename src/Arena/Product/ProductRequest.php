<?php
namespace Arena\Product;

use Arena\Auth\AuthForm;
use GuzzleHttp\Client;

class ProductRequest
{
    // URL to update or create product
    const URL = 'api/products/products/updates.json';
    const URL_STATUS = 'api/products/products/statuses/updates.json';
    const URL_PICTURE_ADD = 'api/products/products/pictures/adds.json';
    const URL_PICTURE_GET = 'api/products/products/%s/pictures/gets.json';
    const URL_PICTURE_DELETE = 'api/products/products/%s/pictures/deletes.json';
    const URL_ATTRIBUTE_ADD = 'api/products/products/attributes/adds.json';

    /**
     * @return string
     */
    private function prepareUriForCreate()
    {
        return GATEWAY . self::URL;
    }

    /**
     * @return string
     */
    private function prepareUriForStatus()
    {
        return GATEWAY . self::URL_STATUS;
    }

    /**
     * @return string
     */
    private function prepareUriForPictureAdd()
    {
        return GATEWAY . self::URL_PICTURE_ADD;
    }

    /**
     * @param string $productId
     * @return string
     */
    private function prepareUriForPictureList($productId)
    {
        return GATEWAY . sprintf(self::URL_PICTURE_GET, $productId);
    }

    /**
     * @param $pictureId
     * @return string
     */
    private function prepareUriForPictureDelete($pictureId)
    {
        return GATEWAY . sprintf(self::URL_PICTURE_DELETE, $pictureId);
    }

    /**
     * @return string
     */
    private function prepareUriForAttributeAdd()
    {
        return GATEWAY . self::URL_ATTRIBUTE_ADD;
    }

    /**
     * Method to update or create products in Arena.pl
     *
     * @param Product $product
     * @return \stdClass[]
     */
    public function updateOrCreateProduct(Product $product)
    {
        $uri = $this->prepareUriForCreate();
        $client = new Client();

        $r = $client->request('POST', $uri, [
            'json' => $product->getRequestArray(),
            'debug' => false
        ]);

        return json_decode($r->getBody()->getContents());
    }

    /**
     * Method to update product status in Arena.pl
     *
     * @param ProductStatus $productStatus
     * @return \stdClass[]
     */
    public function updateProductStatus(ProductStatus $productStatus)
    {
        $uri = $this->prepareUriForStatus();
        $client = new Client();

        $r = $client->request('POST', $uri, [
            'json' => $productStatus->getRequestArray(),
            'debug' => false
        ]);

        return json_decode($r->getBody()->getContents());
    }

    /**
     * Method to create product images in Arena.pl
     *
     * @param ProductPicture $productPicture
     * @return \stdClass[]
     */
    public function addProductPicture(ProductPicture $productPicture)
    {
        $uri = $this->prepareUriForPictureAdd();
        $client = new Client();

        $r = $client->request('POST', $uri, [
            'json' => $productPicture->getRequestArray(),
            'debug' => false
        ]);

        return json_decode($r->getBody()->getContents());
    }

    /**
     * Method to list all product images from arena.pl
     *
     * @param AuthForm $auth
     * @return mixed
     */
    public function getProductPictureList($productId, AuthForm $auth)
    {
        $uri = $this->prepareUriForPictureList($productId);
        $client = new Client();

        $r = $client->request('POST', $uri, [
            'json' => $auth->getRequestArray(),
            'debug' => false
        ]);

        return json_decode($r->getBody()->getContents());
    }

    /**
     * Method to remove single product picture
     *
     * @param $pictureId
     * @param AuthForm $auth
     * @return mixed
     */
    public function removeProductPicture($pictureId, AuthForm $auth)
    {
        $uri = $this->prepareUriForPictureDelete($pictureId);
        $client = new Client();

        $r = $client->request('POST', $uri, [
            'json' => $auth->getRequestArray(),
            'debug' => false
        ]);

        return json_decode($r->getBody()->getContents());
    }

    /**
     * @param ProductAttribute $productAttribute
     * @return mixed
     */
    public function addProductAttribute(ProductAttribute $productAttribute)
    {
        $uri = $this->prepareUriForAttributeAdd();
        $client = new Client();

        $r = $client->request('POST', $uri, [
            'json' => $productAttribute->getRequestArray(),
            'debug' => false
        ]);

        return json_decode($r->getBody()->getContents());
    }
}