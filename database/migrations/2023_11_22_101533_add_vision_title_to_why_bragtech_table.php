<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisionTitleToWhyBragtechTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('why_braghtech_pages', 'our_vision_title')) {
            Schema::table('why_braghtech_pages', function (Blueprint $table) {
                $table->string('our_vision_title')->nullable()->after('our_vision_text');
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
        if (Schema::hasColumn('why_braghtech_pages', 'our_vision_title')) {
            Schema::table('why_braghtech_pages', function (Blueprint $table) {
                $table->dropColumn("our_vision_title");
            });
        }        
    }
}
