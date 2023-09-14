<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("userId")->constrained("users")->onDelete('cascade')->onUpdate('cascade');
            $table->string("firstName");
            $table->string("lastName");
            $table->integer("phone");
            $table->string("city");
            $table->string("state");
            $table->string("address");
            $table->integer("zip_code");
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
        Schema::dropIfExists('customers');
    }
}
