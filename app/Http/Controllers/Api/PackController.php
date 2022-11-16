<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pack;
use App\Repositories\PackRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PackController extends Controller
{
    private PackRepository $repository;

    public function __construct()
    {
        $this->repository = new PackRepository(new Pack());
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return $this->repository->getList($request->query());
    }
}
