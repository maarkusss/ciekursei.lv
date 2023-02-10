<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToTables extends Migration
{
    /**
     * Add indexes to the provided table rows.
     * @param $table
     * @param $table_name
     * @param $indexes
     * @return void
     */
    private function addIndexes($table, $table_name, $indexes)
    {
        // Get the DB connection and get the current indexes in the table
        $sm = Schema::getConnection()->getDoctrineSchemaManager();
        $existing_indexes = $sm->listTableIndexes($table_name);
        // Iterate over the indexes array and see if the values are not
        // already in use, if not, add them
        foreach ($indexes as $index) {
            if (!array_key_exists($index, $existing_indexes)) {
                $table->index($index, $index);
            }
        }
    }

    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $table_name = 'visitors';
            $indexes = ['ip', 'created_at', 'updated_at'];
            $this->addIndexes($table, $table_name, $indexes);
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::table('visitors', function (Blueprint $table) {
            $indexes = ['ip', 'created_at', 'updated_at'];
            foreach ($indexes as $index) {
                $table->dropIndex($index);
            }
        });
    }
}
