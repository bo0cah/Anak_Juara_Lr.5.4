@extends('layouts.master')
@section('title','Daftar Pengajuan') <!--pemberian judul halaman-->

@section('content')

   <h2>Pengajuan</h2>
   <div class="row" >
      <div class="col-md-10 col-md-offset-2">
          <form action="" class="form-inline">
              <div class="input-group input-lg" style="width: 60%">
                  <input type="text" class="form-control input-md" placeholder="Pencarian...">
                  <span class="input-group-btn">
                      <button class="btn btn-default btn-md" type="button"><i class="glyphicon glyphicon-search"></i> Cari</button>
                  </span>
                </div><!-- /input-group -->
              <a href="{{ URL::to('Pengaju-form') }}">
                  <div class="btn btn-primary btn-md" type="button">Pengajuan Baru</div>
              </a>
              <a href="{{ URL::to('unduhExcel/xlsx') }}">
                  <div class="btn btn-primary btn-md" type="button">Unduh Excel</div>
              </a>
          </form>
      </div>
   </div><br>

  <!--Rangking dan gambar-->
  @foreach ($pengajuan as $pengaju)
    {{-- expr --}}
    <div class="col-xs-12 col-sm-6 col-md-6">
      <div class="well well-sm">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <img src="{{ asset('../photos/'.$pengaju->Photo) }}" alt="Photo {{ $pengaju->nama }}" class="img-circle" style="height: 120px; width: 120px" />
          </div>
          <div class="col-sm-6 col-md-8">
            <h4>{{ $pengaju->nama }}</h4>
            <small>
              <cite title="">
              <i class="glyphicon glyphicon-map-marker"></i>
              {{ $pengaju->Alamat_Anak }}  RT/RW : 0{{ $pengaju->RT_Anak }}/0{{ $pengaju->RW_Anak }} Kel. {{ $pengaju->Desa_Anak }}  Kec. {{ $pengaju->Kec_Anak }} </cite>
            </small>
            <p>
              <i class="glyphicon glyphicon-phone"></i> {{ $pengaju->HP_Telp }}
              <i class="glyphicon glyphicon-gift"></i> {{ $pengaju->Tgl_Lahir }}
              <br>
              <span class="label label-info">{{ $pengaju->Jenjang_Pendidikan }}</span>
              <span class="label label-success">{{ $pengaju->Keberadaan_Ortu }}</span>
              <span class="label label-danger">{{ $pengaju->Wilayah_Pembinaan }}</span>
            </p>
            <!-- Split button -->
            <div class="btn-group">
              <a href="{{ action('PengajuController@profil', $pengaju->id)}}">
                <div type="button" class="btn btn-primary btn-sm">Lihat Profil</div>
              </a>
              <a href="{{ URL::to('profil/cetak') }}">
                <div type="button" class="btn btn-primary btn-sm">Cetak</div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection

@section('sidenav')
  @foreach ($pengajuan as $pengaju)
    <div id="affix-nav" class="hidden-print hidden-xs hidden-sm affix">
        <ul class="nav sidenav affix" data-spy="affix" data-offset-top="10">
          <li><a href="#{{ $pengaju->nama }}">{{ $pengaju->nama }}</a></li>
        </ul>
    </div>

  @endforeach
@endsection
