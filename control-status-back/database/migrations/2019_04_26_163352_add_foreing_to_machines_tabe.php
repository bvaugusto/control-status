<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingToMachinesTabe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_machines', function (Blueprint $table) {
//            $table->foreign('id_machine')->references('id')->on('machines')->after('id');
//            $table->foreign('publication_description_id')->unsigned()->index()->foreign()->references('id')->on('publication_descriptions')->change();

//            $table->foreign('id_status')->references('id')->on('status')->after('id_machine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_machines', function (Blueprint $table) {
//            $table->dropForeign('id_machine');
//            $table->dropForeign('id_status');
        });
    }
}
