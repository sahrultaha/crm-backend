<?php

namespace App\Repositories;

trait TraitSelectUnprocessedRows
{
    /**
     * return collection of
     *
     * @param  int  $file_id
     * @return \Generator
     */
    public function selectUnprocessedRows(int $file_id)
    {
        $id = 0;
        for (; ;) {
            /* @var $rows Collection */
            $rows = $this->model->query()
                ->where('file_id', $file_id)
                ->where('id', '>', $id)
                ->take(10)
                ->orderBy('id')
                ->get();
            if ($rows->isEmpty()) {
                break;
            }

            $id = $rows->last()->id;

            yield $rows;
        }
    }
}
