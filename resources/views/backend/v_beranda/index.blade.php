@extends('backend.v_layouts.app')
@section('content')
    <!-- contentAwal -->
    <h3> {{$judul}} </h3>
    <p>
        ses yang anda miliki sebagai
        <b>
            @if (Auth::user()->role == 1)
                Super Admin
            @elseif(Auth::user()->role == 0)
                Admin
            @endif
        </b>
        ini adalah halaman utama dari aplikasi ini.
    </p>
    <!-- contentAkhir -->
@endsection