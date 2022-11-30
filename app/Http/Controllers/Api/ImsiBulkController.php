<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ImsiBulkController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $repo = new BaseRepository(new File());
        $limit = $request->get('limit', 10);
        $sort = $request->get('sort', 'desc');
        $page = $request->get('page', 1);
        $attributes = [['file_category_id' => \App\Models\FileCategory::BULK_IMSI]];

        return JsonResource::collection($repo->paginate($limit, $sort, $page, $attributes));
    }
}
