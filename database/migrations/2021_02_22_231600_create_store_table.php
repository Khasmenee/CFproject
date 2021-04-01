<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slide_image1')->nullable();
            $table->string('slide_image2')->nullable();
            $table->string('slide_image3')->nullable();
            $table->string('store_name');
            $table->string('detail');
            $table->string('manager_name');
            $table->string('Admin_name');
            $table->string('image')->nullable();
            $table->string('address');
            $table->string('telephone');
            $table->string('line_id');
            $table->string('facebook_page');
            $table->string('topic_homepage');
            $table->string('topic_workings');
            $table->string('payment_show');
            $table->string('payment_topic');
            $table->string('payment_detail');
            $table->string('bank_image')->nullable();
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
        Schema::dropIfExists('store');
    }
}
