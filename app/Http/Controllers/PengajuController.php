<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Pengaju as Pengajuan;
use Carbon\Carbon;

class PengajuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $pengajuan = Pengajuan::all();
        //Halaman utama menampilkan Daftar pengajuan yang telah dirangking
        return view('pengaju.index')->with('pengajuan', $pengajuan);
    }

    public function profil($id)
    {
        
        //mencari data pengaju di database berdasarkan id
        $data = Pengajuan::find($id);

        // return $data->nama;
        return view('pengaju.profil')->with('data', $data);
    }

    public function cetakProfil($id)
    {
        return 'cetak nama'.Pengajuan::find($id)->nama;
    }

    public function form()
    {
        return view('pengaju.form');
    }

    //new tes simpan
    public function simpan(Request $request)
    {
        $data = $request->all();
        $AlamatAnak = $data['Alamat_Anak'].' RT-'.$data['RT_Anak'].' RW-'.$data['RW_Anak'].' Desa/Kel. '.$data['Desa_Anak'].' Kec. '.$data['Kec_Anak'];

        //data ayah
        if ($request->input('Ayah_Serumah')) {
            $data['Alamat_Ayah'] = $AlamatAnak;
        };

        //data ibu
        if ($request->input('Ibu_Serumah')) {
            $data['Alamat_Ibu'] = $AlamatAnak;
        };

        //data wali
        if ($request->input('Wali_Serumah')) {
            $data['Alamat_Wali'] = $AlamatAnak;
        };

        //upload photo
        $photo = $request->file('Photo')->getClientOriginalName();

        $destination = base_path() . '/public/photo/';

        $request->file('Photo')->move($destination, $photo);

        $data['Photo'] = $photo;

        Pengajuan::create($data);
        return "data sukses disimpan";
    }

    public function unduhExcel($ext) //$ext variable pengatur Extensi file | csv xls xlsx
    {
        $data = Pengajuan::get()->toArray();
        $output = Excel::create('Rangking Pengajuan Beasiswa Ceria',
                    function ($excel) use ($data) {
                        $excel->sheet('Pengajuan', function ($sheet) use ($data) {
                            $sheet->fromArray($data);
                        });
                    })->download($ext);

        return $output;
    }

    public function unggahExcel(Request $request)
    {
        
        $file = $request->file('import_file');
        if(!empty($file))
        {
            $path = $file->getRealPath();
            $data = Excel::load($path, function($reader){ // reader methods callback is optional
            })->get();

            if(!empty($data) && $data->count())
            {
                foreach ($data as $key => $value) 
                {
                    $insert = [
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'NIK' => $value->nik,
                        'nama' => $value->nama,
                        'kelamin' => $value->kelamin,
                        'tempat_lahir' => $value->tempat_lahir,
                        'Tgl_Lahir' => $value->tgl_lahir,
                        'Anak_Ke' => $value->anak_ke,
                        'Jlh_Sdr' => $value->jlh_sdr,
                        'Alamat_Anak' => $value->alamat_anak,
                        'RT_Anak' => $value->rt_anak,
                        'RW_Anak' => $value->rw_anak,
                        'Desa_Anak' => $value->desa_anak,
                        'Kec_Anak' => $value->kec_anak,
                        'Deskripsi_Diri' => $value->deskripsi_diri,
                        'HP_Telp' => $value->hp_telp,
                        'Photo' => $value->photo,
                        'Wilayah_Pembinaan' => $value->wilayah_pembinaan,
                        'Jenjang_Pendidikan' => $value->jenjang_pendidikan,
                        'Kelas_Smt' => $value->kelas_smt,
                        'Nilai_IPK' => $value->nilai_ipk,
                        'Nama_Sklh_Kampus' => $value->nama_sklh_kampus,
                        'Alamat_Sekolah' => $value->alamat_sekolah,
                        'Keberadaan_Ortu' => $value->keberadaan_ortu,
                        'Nama_Ayah' => $value->nama_ayah,
                        'Pend_Ayah' => $value->pend_ayah,
                        'Alamat_Ayah' => $value->alamat_ayah,
                        'Nama_Ibu' => $value->nama_ibu,
                        'Pend_Ibu' => $value->pend_ibu,
                        'Alamat_Ibu' => $value->alamat_ibu,
                        'Nama_Wali' => $value->nama_wali,
                        'Pend_Wali' => $value->pend_wali,
                        'Alamat_Wali' => $value->alamat_wali,
                        'penghasilan' => $value->penghasilan,
                        'stts_tinggal' => $value->stts_tinggal
                    ];
                }
                // if(!empty($insert))
                // {
                //     DB::table('pengajuan')->insert($insert);
                //     dd('Insert Record successfully.');
                // }
            }
        }

        // return printf("Right now is %s", Carbon::now()->toDateTimeString());

        // return dd($insert[1]);

        return dd($insert);
    }

    public function hitung_skor($pengaju)
    {
        $
        $skor_jpa = array('SD' => 1, 'SMP' => 3/4, 'SMA/SMK/sederajat' => 2/4, 'Perguruan Tinggi' => 1/4 );


        $

        
        if ($pendidikan_anak=='Perguruan Tinggi') {
            switch ($nilai_akademik) {
                case ($nilai_akademik<2):
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        } else {
            # code...
        }
        

        $keberadaan_ortu = array('Lengkap' => 1, 'Piatu' => 3/4, 'Yatim' => 2/4, 'Yatim Piatu' => 1/4 ); //keberadaan orang tua
        $pendidikan_ortu = array('Tidak Sekolah' => 1, 'SD' => 3/4, 'SMP/sederajat' => 2/4, 'SMA/SMK/sederajat' => 1/4 ); //pendidikan ayah/ibu
        $stts_tinggal = array('Menumpang' => 1, 'Sewa' => 2/3, 'Hak milik' => 1/3 );


         
        // Nilai Rata-Rata Akademik (NA) //pake if
        // Jumlah Saudara (JS) //pake if
        // Urutan Kelahiran (UK)   //pake if
        // Keberadaan Orang Tua (KO) //
        // Pendidikan Ayah (PA)
        // Pendidikan Ibu (PI)
        // Status Tempat Tinggal (TT)
        // Satu Kecamatan dg Tp. Pembinaan (KP) //boolean
        // Penghasilan Orang Tua/Wali (TP) //if
        // Penghasilan Wali (PW) //if
        // Lama Data Mengantri (LA) //sort by older

    }
}
