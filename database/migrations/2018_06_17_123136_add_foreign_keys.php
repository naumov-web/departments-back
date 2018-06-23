<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('department_staffes', function($table) {
            $table->integer('staff_id')->unsigned()->change();
            $table->integer('department_id')->unsigned()->change();
            $table->foreign('staff_id')
                  ->references('id')->on('staffes');
            $table->foreign('department_id')
                  ->references('id')
                  ->on('departments')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
