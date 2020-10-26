<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostsTable extends Migration{

    public function up(){
        Schema::create('costs', function (Blueprint $table) {
            $table->id();
            $table->string('type_id');
            $table->string('amount');
            $table->string('frequncy_id');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('costs');
    }
}
