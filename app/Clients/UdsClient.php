<?php

namespace App\Clients;

use DateTime;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

class UdsClient
{
    private Client $client;
    public function __construct($companyId, $apiKey)
    {
        $authorization = base64_encode($companyId . ':' . $apiKey);
        $this->client = new Client([
            'headers' => [
                'Authorization' => ['Basic '. $authorization],
                "Accept-Charset" => "utf-8",
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function create($url, $data)
    {
        $date = new DateTime();
        $uuid = Str::uuid();
        $result = $this->client->request('post', $url, [
            'Accept' => 'application/json',
            'X-Origin-Request-Id' => $uuid,
            'X-Timestamp' => $date->format(DateTime::ATOM),
            'http_errors' => false,
            'body' => json_encode($data),
        ]);

        return json_decode($result->getBody()->getContents());
    }

    public function get($url)
    {
        $date = new DateTime();
        $uuid = Str::uuid();
        $result = $this->client->request('get', $url, [
            'Accept' => 'application/json',
            'X-Origin-Request-Id' => $uuid,
            'X-Timestamp' => $date->format(DateTime::ATOM),
            'http_errors' => false,
        ]);

        return json_decode($result->getBody());
    }

    public function delete($url)
    {
        $date = new DateTime();
        $uuid = Str::uuid();
        $result = $this->client->request('delete', $url, [
            'Accept' => 'application/json',
            'X-Origin-Request-Id' => $uuid,
            'X-Timestamp' => $date->format(DateTime::ATOM),
            'http_errors' => false,
        ]);

        return json_decode($result->getBody());
    }

    public function update($url, $data)
    {
        $date = new DateTime();
        $uuid = Str::uuid();
        $result = $this->client->request('put', $url, [
            'Accept' => 'application/json',
            'X-Origin-Request-Id' => $uuid,
            'X-Timestamp' => $date->format(DateTime::ATOM),
            'http_errors' => false,
            'body' => json_encode($data),
        ]);

        return json_decode($result->getBody());
    }
}
