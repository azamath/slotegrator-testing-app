<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodPrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_prizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('good_id')->index();
            $table->string('good_name'); // denormalization
            $table->string('status', 16)->default(\App\Enums\GoodStatus::__DEFAULT)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_prizes');
    }
}
