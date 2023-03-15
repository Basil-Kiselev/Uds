<?php

namespace App\Services;

use App\Models\Item;
use App\Models\Setting;
use App\Services\Dto\ItemCreateDto;


class ItemService
{
    public function createItem(ItemCreateDto $dto)
    {
        $url = "https://api.uds.app/partner/v2/goods";

        $dataLocal = [
            'name' => $dto->getName(),
                'type' => $dto->getType(),
                'price' => $dto->getPrice(),
                'description' => $dto->getDescription(),
                'minQuantity' => $dto->getMinQuantity(),
                'increment' => $dto->getIncrement(),
        ];

        $data = [
            'name' => $dto->getName(),
            'data' => [
                'type' => $dto->getType(),
                'price' => $dto->getPrice(),
                'description' => $dto->getDescription(),
                'minQuantity' => $dto->getMinQuantity(),
                'increment' => $dto->getIncrement(),
            ],
        ];
        $setting = Setting::query()->find('1');
        $apiKey = $setting['api_key'];
        $companyId = $setting['company_id'];

        $localItem = Item::query()->create($dataLocal);
        $result = (new UdsClient($companyId, $apiKey))->create($url,$data);
        //проверить возврат функции (перекодировка в джсон)
        $udsRespon = json_decode((json_encode($result)), true) ;

        $localItem->update([
            'uds_id' => $udsRespon['id']
        ]);

        return $result;
    }

    public function getItem($id)
    {
        $setting = Setting::query()->find('1');
        $apiKey = $setting['api_key'];
        $companyId = $setting['company_id'];
        $url = "https://api.uds.app/partner/v2/goods" . '/' . $id;

        return $result = (new UdsClient($companyId, $apiKey))->get($url);
    }
}
