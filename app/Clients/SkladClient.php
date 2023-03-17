<?php

namespace App\Clients;

use GuzzleHttp\Client;

class SkladClient
{
    public function __construct($token)
    {
        $this->client = new Client([
            'headers' => [
                'Authorization' => 'Bearer' . ' ' . $token,
                'Content-Type' => 'application/json',
                'Lognex-Pretty-Print-JSON' => true,
            ]
        ]);
    }

    public function getProduct($id)
    {
        $url = "https://online.moysklad.ru/api/remap/1.2/entity/product/". $id;
        $result = $this->client->request('get', $url);

        return $result;
    }

    public function getProducts()
    {
        $url = "https://online.moysklad.ru/api/remap/1.2/entity/product/";
        $result = $this->client->request('get', $url);

        return $result;
    }
}
