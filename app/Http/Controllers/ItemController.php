<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemCreateRequest;
use App\Services\Dto\ItemCreateDto;
use App\Services\ItemService;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    public function createItem(ItemCreateRequest $itemCreateRequest, ItemService $itemService)
    {

        $dto = new ItemCreateDto(
            $itemCreateRequest->getName(),
            $itemCreateRequest->getType(),
            $itemCreateRequest->getPrice(),
            $itemCreateRequest->getDescription(),
//            $itemCreateRequest->getMeasurement(),
//            $itemCreateRequest->getInventory(),
            $itemCreateRequest->getMinQuantity(),
            $itemCreateRequest->getIncrement(),
        );
        $item = $itemService->createItem($dto);

        return new JsonResponse($item);
    }
}
