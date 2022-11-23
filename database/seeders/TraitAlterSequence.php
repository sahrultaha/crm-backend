<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

trait TraitAlterSequence
{
    public function alterSequence($table_name)
    {
        if (env('DB_CONNECTION') === 'pgsql') {
            DB::statement("SELECT setval(pg_get_serial_sequence('{$table_name}', 'id'), coalesce(max(id), 0)+1 , false) FROM {$table_name}");
        }
    }
}
