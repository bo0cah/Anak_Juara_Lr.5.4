<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRangkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->increments('id');
        $table->timestamps('created_at');
        $table->integer('Anak_Ke');
        $table->integer('Jlh_Sdr');
        $table->string('Kec_Anak');
        $table->string('Jenjang_Pendidikan');
        // $table->integer('Kelas_Smt'); ???
        $table->decimal('Nilai_IPK');
        $table->string('Keberadaan_Ortu');
        $table->string('Pend_Ayah')->nullable();
        $table->string('Pend_Ibu')->nullable();
        $table->string('Pend_Wali')->nullable();
        $table->double('penghasilan');
        $table->string('stts_tinggal');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
