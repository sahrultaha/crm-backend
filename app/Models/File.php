<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';

    public function fileCategory(): BelongsTo
    {
        return $this->belongsTo(FileCategory::class);
    }

    public function fileRelationTypes(): BelongsToMany
    {
        return $this->belongsToMany(FileRelationType::class);
    }
}
