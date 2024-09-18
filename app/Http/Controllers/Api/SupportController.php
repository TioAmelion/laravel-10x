<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Enums\paginationEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Http\Resources\SupportResource;
use App\Services\SupportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SupportController extends Controller
{
    public function __construct(protected SupportService $service){}

    public function index(Request $request)
    {
        $support = $this->service->paginate(
            page: $request->get('page', paginationEnum::page->value),
            totalPerPage: $request->get('totalPerPage', paginationEnum::totalPerPage->value),
            filter: $request->filter
        );

        return ApiAdapter::toJson($support);
    }

    public function store(StoreUpdateSupport $request)
    {
        $support = $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return new SupportResource($support);
    }

    public function show(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return response()->json([
                "Error" => 'Not Found'
            ], Response::HTTP_FOUND);
        }

        return new SupportResource($support);
    }

    public function update(StoreUpdateSupport $request, string $id)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request, $id)
        );

        if (!$support) {
            return response()->json([
                 "Error" => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new SupportResource($support);
    }

    public function destroy(string $id)
    {
        if(!$this->service->findOne($id)) {
            return response()->json([
                "Error" => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
