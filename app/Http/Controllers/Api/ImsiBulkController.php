<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\FileBulkImsiRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ImsiBulkController extends Controller
{
    public function __construct(FileBulkImsiRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return \Illuminate\Http\Resources\Json\JsonResource::collection($this->repository->paginate());
    }
}
