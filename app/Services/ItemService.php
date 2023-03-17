<?php

namespace App\Services;

use App\Clients\SkladClient;
use App\Clients\UdsClient;
use App\Models\Item;
use App\Models\Setting;

require_once "config.php";

class ItemService
{
    public function createItem($data)
    {
        $url = (new UrlItem())->getUrl();
        $setting = Setting::query()->find('1');
        $apiKey = $setting['api_key'];
        $companyId = $setting['company_id'];

        $result = (new UdsClient($companyId, $apiKey))->create($url,$data);
        $localData = ['uds_id' => $result->id];
        Item::query()->create($localData);

        return $result;
    }

    public function getItem($id)
    {
        $setting = Setting::query()->find('1');
        $apiKey = $setting['api_key'];
        $companyId = $setting['company_id'];
        $url = (new UrlItem())->getUrl(). '/' . $id;

        return (new UdsClient($companyId, $apiKey))->get($url);
    }

    public function deleteItem($id)
    {
        Item::query()->where('uds_id', $id)->delete();
        $setting = Setting::query()->find('1');
        $apiKey = $setting['api_key'];
        $companyId = $setting['company_id'];
        $url = (new UrlItem())->getUrl(). '/' . $id;

        return (new UdsClient($companyId, $apiKey))->delete($url);
    }

    public function updateItem($id, $data )
    {
        $url = (new UrlItem())->getUrl(). '/' . $id;

        $setting = Setting::query()->find('1');
        $apiKey = $setting['api_key'];
        $companyId = $setting['company_id'];

        $result = (new UdsClient($companyId, $apiKey))->update($url,$data);
        $localData = ['uds_id' => $result->id];
        Item::query()->where('uds_id', $id)->update($localData);

        return $result;
    }

    public function SkladToUds($id)
    {
        $setting = Setting::query()->find('1');
        $token = $setting['token'];
        $dataSklad = (new SkladClient($token))->getProduct($id);
        $data = json_decode($dataSklad->getBody()->getContents());

        $data = [
            'name' => $data->name,
            'data' => [
                'type' => 'ITEM',
                'price' => ($data->salePrices[0]->value/100),
                'sku' => $data->article ?? null,
                'description' => $data->description,
            ]
        ];
        $url = (new UrlItem())->getUrl();
        $setting = Setting::query()->find('1');
        $apiKey = $setting['api_key'];
        $companyId = $setting['company_id'];

        $result = (new UdsClient($companyId, $apiKey))->create($url,$data);

        $localData = ['uds_id' => $result->id];
        Item::query()->create($localData);

        return $result;
    }
}
