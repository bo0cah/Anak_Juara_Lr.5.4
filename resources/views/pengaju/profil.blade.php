@extends('layouts.master')
@section('title','Profil '.$data->nama) <!--pemberian judul halaman-->
@section('content')
{{-- <h2>Profil {{ $data->nama }}</h2> --}}
<div class="row">
   <div class="col-md-12">
      <a href="{{ URL::to('Pengaju-form') }}">
         <div class="btn btn-primary btn-md" type="button">Edit</div>
      </a>
      <a href="{{ URL::to('unduhExcel/pdf') }}">
         <div class="btn btn-primary btn-md" type="button">Cetak</div>
      </a>
      <a href="{{ URL::to('unduhExcel/pdf') }}">
         <div class="btn btn-primary btn-md" type="button">Hapus</div>
      </a>
   </div>
</div><br>
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading">Profil {{ $data->nama }}</div>
         <div class="panel-body">
            <div class="row col-md-12 ">nama</div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('sidenav')
{{-- @foreach ($pengajuan as $pengaju)
<div id="affix-nav" class="hidden-print hidden-xs hidden-sm affix">
   <ul class="nav sidenav affix" data-spy="affix" data-offset-top="5">
      <li><a href="#{{ $pengaju->nama }}">{{ $pengaju->nama }}</a></li>
   </ul>
</div>
@endforeach --}}
@endsection