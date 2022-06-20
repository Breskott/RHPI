<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('telephone')->nullable();
            $table->string('cell_phone');
            $table->string('telephone_emergency')->nullable();
            $table->date('birth');
            $table->string('nationality');
            $table->string('gender');
            $table->string('color', 9);
            $table->string('scholarity');
            $table->string('civil_status');
            $table->string('sons')->nullable();
            $table->string('name_dad')->nullable();
            $table->string('name_mother')->nullable();
            $table->string('zip_code');
            $table->string('andress');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('city');
            $table->char('state', 2);
            $table->string('district');
            $table->string('document_rg');
            $table->string('organization_exp');
            $table->date('date_emission_rg');
            $table->string('document_cpf');
            $table->string('document_ctps');
            $table->string('document_ctps_serie');
            $table->date('date_emission_ctps');
            $table->string('document_pis');
            $table->string('document_title')->nullable();
            $table->string('document_title_zone')->nullable();
            $table->string('document_title_session')->nullable();
            $table->date('date_emission_title')->nullable();
            $table->string('document_reservist')->nullable();
            $table->string('document_cnh')->nullable();
            $table->string('document_cnh_category')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('job_functions_id');
            $table->date('date_admission');
            $table->string('document')->nullable();

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
        Schema::dropIfExists('employes');
    }
};
