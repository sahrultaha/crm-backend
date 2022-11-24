<?php

namespace App\Repositories;

use App\Models\File;
use App\Models\FileRelation;
use Illuminate\Support\Facades\Storage;

class FileRepository
{
    public function createNewFile(array $validated): File
    {
        \Illuminate\Support\Facades\Log::debug(__METHOD__.json_encode($validated));
        /* @var $file \Illuminate\Http\UploadedFile */
        $file = $validated['file'];
        $name = time().'-'.$file->getClientOriginalName();
        $extension = $file->extension();
        $path = Storage::putFileAs(
            env('AWS_BUCKET'),
            $validated['file'],
            $name,
        );

        $file_model = new File();
        $file_model->filename = $name;
        $file_model->filepath = $path;
        $file_model->filetype = $extension;
        $file_model->file_category_id = $validated['file_category_id'];
        $file_model->save();

        if (isset($validated['relation_id']) && isset($validated['relation_type_id'])) {
            $file_relation = new FileRelation();
            $file_relation->relation_id = $validated['relation_id'];
            $file_relation->file_id = $file_model->id;
            $file_relation->file_relation_type_id = $validated['relation_type_id'];
            $file_relation->save();
        }

        return $file_model;
    }

    public function updateFiles($id, array $validated): File
    {
        $file = $validated['file'];
        $name = $file->hashName();
        $extension = $file->extension();
        $path = Storage::putFileAs(
            env('AWS_BUCKET'),
            $validated['file'],
            $name,
        );

        $file_model = File::find($id);
        $file_model->filename = $name;
        $file_model->filepath = $path;
        $file_model->filetype = $extension;
        $file_model->file_category_id = $validated['file_category_id'];
        $file_model->save();

        return $file_model;
    }

    public function generateTemporaryUrl(File $file): string
    {
        return Storage::temporaryUrl($file->filepath, now()->addMinutes(30));
    }
}
