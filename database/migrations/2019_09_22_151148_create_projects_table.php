<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_title');
            $table->string('project_id');
            $table->unsignedBigInteger("project_category_id");
            $table->string('author');
            $table->string('actors');
            $table->text('requirement_analysis');
            $table->text('documentation');
            $table->string('report')->nullable();
            $table->text('summary');
            $table->string('flowchart');
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
        Schema::dropIfExists('projects');
    }
}
