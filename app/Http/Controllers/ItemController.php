<?php

namespace App\Http\Controllers;

use App\Services\ItemService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function createItem(ItemService $itemService, Request $request)
    {
        $data = $request->all();
        $result = $itemService->createItem($data);

        return new JsonResponse($result);
    }

    public function getItem($id, ItemService $itemService)
    {
        $result = $itemService->getItem($id);

        return new JsonResponse($result);
    }

    public function deleteItem($id, ItemService $itemService)
    {
        $result = $itemService->deleteItem($id);

        return new JsonResponse($result);
    }

    public function updateItem($id, ItemService $itemService, Request $request)
    {
        $data = $request->all();
        $result = $itemService->updateItem($id, $data);

        return new JsonResponse($result);
    }

}
