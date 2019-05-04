<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_id');
            $table->string('skill_name');
            $table->string('skill_status');
            $table->integer('skill_duration');
            $table->string('good_skill');
            $table->string('bad_skill');
            $table->string('skill_attach');
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
        Schema::dropIfExists('add_skills');
    }
}
