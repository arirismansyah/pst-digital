<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatbotDbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatbot_db', function (Blueprint $table) {
            $table->id();
            $table->string('pattern');
            $table->string('response');
            $table->string('type');
            $table->string('api_id')->nullable();
            $table->string('api_title')->nullable();
            $table->string('api_cover')->nullable();
            $table->string('api_download')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('chatbot_db');
    }
}
