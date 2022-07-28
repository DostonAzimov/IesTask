<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVertualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vertuals', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('dateOfBirth');
            $table->string('passport');
            $table->string('region');
            $table->string('district');
            $table->string('address');
            $table->string('email');
            $table->boolean('secret')->nullable()->default(true);
            $table->string('phoneNumber');

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
        Schema::dropIfExists('vertuals');
    }
}
