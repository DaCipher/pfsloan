<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments("id");
            $table->string("loan_amount");
            $table->string("loan_purpose");
            $table->string("loan_duration");
            $table->string("firstname");
            $table->string("middlename");
            $table->string("lastname");
            $table->string("dob");
            $table->string("phone");
            $table->string("email");
            $table->string("address");
            $table->string("zip");
            $table->string("state");
            $table->string("city");
            $table->string("employer");
            $table->string("employment_type");
            $table->string("income");
            $table->string("ssn");
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
        Schema::dropIfExists('applications');
    }
};
