<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkNameToSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('solutions', 'link_name')) {
            Schema::table('solutions', function (Blueprint $table) {
                $table->string('link_name')->nullable()->after('link');
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solutions', function (Blueprint $table) {
            $table->dropColumn("link_name");
        });        
    }
}
