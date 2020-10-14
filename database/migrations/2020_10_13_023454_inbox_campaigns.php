<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InboxCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbox_campaigns',function (Blueprint $table){
            $table->id();
            $table->string('title',255);
            $table->string('link',255);
            $table->boolean('status');
            $table->text('description');
            $table->dateTime('date');
            $table->string('zone',255);
            $table->char('limit',3);
            $table->string('import_csv',255);
            $table->string('block',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inbox_campaigns');
    }
}
