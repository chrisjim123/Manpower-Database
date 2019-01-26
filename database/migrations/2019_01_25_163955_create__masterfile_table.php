<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Masterfile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('last_name');
            $table->text('first_name'); 
            $table->text('middle_name');
            $table->text('gender'); 
            $table->text('birthdate');
            $table->text('placeofbirth'); 
            $table->text('phone'); 
            $table->text('email');
            $table->text('location'); 
            $table->text('religion'); 
            $table->text('civil_status'); 
            $table->text('elem_school'); 
            $table->text('elemgrad'); 
            $table->text('high school'); 
            $table->text('hsgrad'); 
            $table->text('college'); 
            $table->text('collegegrad'); 
            $table->text('sss'); 
            $table->text('phil'); 
            $table->text('pag-ibig'); 
            $table->text('tin'); 
            $table->text('employee_number'); 
            $table->text('card_number'); 
            $table->text('company_name'); 
            $table->text('company_address'); 
            $table->text('company_tel'); 
            $table->text('company_email'); 
            $table->text('position'); 
            $table->text('datehired'); 
            $table->text('emp_status');     
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
        Schema::dropIfExists('Masterfile');
    }
}
