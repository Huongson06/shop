<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \DB::statement("DROP VIEW IF EXISTS `warehouse_outs_view`; ");
        \DB::statement("  
        CREATE VIEW warehouse_outs_view AS
        SELECT
            year(created_at) as v_year,
            month(created_at) as v_month,
            day(created_at) as v_day,
            final_amount ,
            status
        FROM
            warehouseouts ;
        
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::statement("
        drop view if exists warehouse_outs_view");
    }
};