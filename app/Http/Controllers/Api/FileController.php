<?php

namespace App\Http\Controllers\Api;

use App\Events\FileUploaded;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\FileStoreRequest;
use App\Models\File;
use App\Repositories\FileRepository;
use Illuminate\Http\JsonResponse;

class FileController extends Controller
{
    private FileRepository $repository;

    public function __construct(FileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(FileStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $file = $this->repository->createNewFile($validated);
        FileUploaded::dispatch($file);

        return response()->json([
            'id' => $file->id,
        ], 201);
    }

    public function show(File $file): JsonResponse
    {
        $url = $this->repository->generateTemporaryUrl($file);

        return response()->json([
            'url' => $url,
        ]);
    }

    public function update(FileStoreRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $id = $request['file_id'];
        $file = $this->repository->updateFiles($id, $validated);

        return response()->json([
            'id' => $file->id,
        ], 201);
    }
}
