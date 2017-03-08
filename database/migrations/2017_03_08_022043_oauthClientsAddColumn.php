<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OauthClientsAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oauth_clients', function (Blueprint $table) {
            $table->tinyInteger('auto_submit')->after('name')->default(0)->index()->unsigned()->comments = 'auto confirm authorization page';
            $table->integer('group_id')->after('name')->default(0)->index()->unsigned()->comments = 'group id';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oauth_clients', function (Blueprint $table) {
            $table->dropColumn('auto_submit');
            $table->dropColumn('group_id');
        });
    }
}
