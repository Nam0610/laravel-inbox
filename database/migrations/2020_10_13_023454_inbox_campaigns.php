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
            $table->string('tieu_de',255);
            $table->string('link',255);
            $table->boolean('trang_thai');
            $table->text('noi_dung');
            $table->dateTime('hien_thi_toi_ngay');
            $table->string('hien_thi_tren_zone',255);
            $table->char('pham_vi_gian_hang',3);
            $table->string('import_csv',255);
            $table->string('khong_hien_thi_voi_cac_gian_hang',255);
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
