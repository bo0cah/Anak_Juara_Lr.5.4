<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps('created_at');
            $table->string('NIK')->unique();
            $table->string('nama');
            $table->char('kelamin',9);
            $table->string('tempat_lahir');
            $table->date('Tgl_Lahir');
            $table->integer('Anak_Ke');
            $table->integer('Jlh_Sdr');
            $table->string('Alamat_Anak');
            $table->integer('RT_Anak');
            $table->integer('RW_Anak');
            $table->string('Desa_Anak');
            $table->string('Kec_Anak');
            $table->string('Deskripsi_Diri');
            $table->string('Photo')->default('default.png');

            $table->string('Wilayah_Pembinaan');
            $table->string('Jenjang_Pendidikan');
            $table->integer('Kelas_Smt');
            $table->decimal('Nilai_IPK');
            $table->string('Nama_Sklh_Kampus');
            $table->string('Alamat_Sekolah');

            $table->string('Keberadaan_Ortu');
            $table->string('Nama_Ayah')->nullable();
            $table->string('Pend_Ayah')->nullable();
            $table->string('Alamat_Ayah')->nullable();

            $table->string('Nama_Ibu')->nullable();
            $table->string('Pend_Ibu')->nullable();
            $table->string('Alamat_Ibu')->nullable();
            
            $table->string('Nama_Wali')->nullable();
            $table->string('Pend_Wali')->nullable();
            $table->string('Alamat_Wali')->nullable();

            $table->double('penghasilan');
            $table->string('stts_tinggal');
            $table->string('HP_Telp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
}
