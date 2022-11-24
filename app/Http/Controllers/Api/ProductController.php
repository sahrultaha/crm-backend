<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    private BaseRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository(new Product());
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        return $this->repository->getList($request->query());
    }
}
