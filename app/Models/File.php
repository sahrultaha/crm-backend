<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';

    protected $appends = [
        'file_bulk_imsi_count_new',
        'file_bulk_imsi_count_success',
        'file_bulk_imsi_count_fail',
    ];

    protected $bulk_imsi_count = null;

    public function fileCategory(): BelongsTo
    {
        return $this->belongsTo(FileCategory::class);
    }

    public function fileRelationTypes(): BelongsToMany
    {
        return $this->belongsToMany(FileRelationType::class);
    }

    protected function fileBulkImsiCountNew(): Attribute
    {
        return $this->getFileBulkImsiCountByKey(RowStatus::NEW);
    }

    protected function fileBulkImsiCountSuccess(): Attribute
    {
        return $this->getFileBulkImsiCountByKey(RowStatus::SUCCESS);
    }

    protected function fileBulkImsiCountFail(): Attribute
    {
        return $this->getFileBulkImsiCountByKey(RowStatus::FAIL);
    }

    protected function getFileBulkImsiCountByKey($key)
    {
        $counters = $this->getFileBulkImsiCount();
        $count = 0;
        foreach ($counters as $counter) {
            if ($counter['row_status_id'] === $key) {
                $count = $counter['count_by_row_status_id'];
            }
        }

        return new Attribute(
            get: fn () => $count,
        );
    }

    protected function getFileBulkImsiCount(): array
    {
        if (! $this->exists || $this->file_category_id !== FileCategory::BULK_IMSI) {
            return $this->bulk_imsi_count = [];
        }

        if ($this->bulk_imsi_count !== null) {
            return $this->bulk_imsi_count;
        }

        $repo = new \App\Repositories\FileBulkImsiRepository();

        return $this->bulk_imsi_count = $repo->selectByFileIdGroupByRowStatusID($this->id)->toArray();
    }
}
