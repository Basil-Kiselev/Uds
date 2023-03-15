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
            $itemCreateRequest->getMinQuantity(),
            $itemCreateRequest->getIncrement(),
        );
        $item = $itemService->createItem($dto);

        return new JsonResponse($item);
    }

    public function getItem($id, ItemService $itemService)
    {
        $item = $itemService->getItem($id);
 
        return new JsonResponse($id);
    }
}
