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
        Schema::create('societies', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('fullname');
            $table->string('photo');
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->string('pob');
            $table->date('dob');
            $table->string('address');
            $table->enum('religion', ['islam', 'katolik', 'kristen', 'hindu', 'budha', 'kong hu chu']);
            $table->enum('marital_status', ['kawin', 'belum kawin']);
            $table->string('profession');
            $table->enum('nationality', ['wni', 'wna', 'Indonesia']);
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
        Schema::dropIfExists('societies');
    }
};
