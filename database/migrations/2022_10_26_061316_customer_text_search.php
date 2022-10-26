<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE customer
            ADD COLUMN fulltext tsvector
            GENERATED ALWAYS AS (to_tsvector('english', 
            coalesce(name, '') || ' ' || coalesce(email, '') || ' ' || coalesce(mobile_number, '')  
            )) STORED;");
        DB::statement('CREATE INDEX fulltext_idx ON customer USING GIN (fulltext);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('customer', 'fulltext');
    }
};
