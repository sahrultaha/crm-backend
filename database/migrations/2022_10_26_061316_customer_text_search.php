<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        if (env('DB_CONNECTION') === 'pgsql') {
            DB::statement("ALTER TABLE customer
            ADD COLUMN fulltext tsvector
            GENERATED ALWAYS AS (to_tsvector('english', 
            coalesce(name, '') || ' ' || coalesce(email, '') || ' ' || coalesce(mobile_number, '') || ' ' || coalesce(ic_number, '')
            )) STORED");
            DB::statement('CREATE INDEX IF NOT EXISTS fulltext_idx ON customer USING GIN (fulltext)');

            return;
        }
        Schema::table('customer', function (Blueprint $table) {
            $table->addColumn('text', 'fulltext', ['nullable' => true]);
        });
        DB::statement("CREATE TRIGGER IF NOT EXISTS customer_insert_trigger AFTER INSERT ON customer
BEGIN
	update customer set fulltext = NEW.name || ' ' || NEW.email || ' ' || NEW.mobile_number || ' ' || NEW.ic_number WHERE id = NEW.id;
END;");
        DB::statement("CREATE TRIGGER IF NOT EXISTS customer_update_trigger UPDATE ON customer
BEGIN
	update customer set fulltext = NEW.name || ' ' || NEW.email || ' ' || NEW.mobile_number || ' ' || NEW.ic_number WHERE id = NEW.id;
END;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (env('DB_CONNECTION') === 'sqlite') {
            DB::statement('DROP TRIGGER IF EXISTS customer_update_trigger');
            DB::statement('DROP TRIGGER IF EXISTS customer_insert_trigger');
        }
        Schema::table('customer', function (Blueprint $table) {
            $table->dropColumn('fulltext');
        });
    }
};
