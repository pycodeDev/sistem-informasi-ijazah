@extends('layouts.master')
@php
    use Illuminate\Support\Str;
@endphp
@section('title', 'Sistem Ijazah')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ijazah</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12">
            @isset($detail_user[0])
                @if (Auth()->User()->level == 'mhs')
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            Data Informasi Mahasiswa
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>NIM</td>
                                    <td>{{ $detail_user[0]->nim }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat / Tanggal Lahir</td>
                                    <td>{{ Str::ucfirst($detail_user[0]->tempat_lahir) }} / {{ $formattedDate }}</td>
                                </tr>
                                <tr>
                                    <td>Program Studi</td>
                                    <td>{{ Str::ucfirst($detail_user[0]->program_studi) }}</td>
                                </tr>
                                <tr>
                                    <td>Fakultas</td>
                                    <td>{{ Str::ucfirst($detail_user[0]->fakultas) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif
            @endisset
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    @isset($detail_user[0])
                        @isset($ijazah)
                            @if (Auth()->User()->level == 'mhs')
                                @if ($pending < 1)
                                    <a class="btn btn-sm btn-danger mb-2" href="{{ route('req_ijazah', ['nim' => $detail_user[0]->nim]) }}">Request Ijazah</a>
                                @endif
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nim</td>
                                        <td>Status</td>
                                        <td>Tanggal</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ijazah as $data)
                                    @php
                                        $no = 1
                                    @endphp
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nim }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            @if (Auth()->User()->level == 'mhs')
                                Silahkan Request Ijazah Anda Dengan Klik Button Berikut <a href="{{ route('req_ijazah', ['nim' => $detail_user[0]->nim]) }}">Request Ijazah</a>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nim</td>
                                            <td>Status</td>
                                            <td>Tanggal</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td colspan="4">Data Kosong</td>
                                       </tr>
                                    </tbody>
                                </table>
                            @endif
                        @endisset
                    @else
                        @if (Auth()->User()->level == 'mhs')
                            Silahkan Isi Detail Informasi anda Di Menu Data Diri. 
                        @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nim</td>
                                    <td>Status</td>
                                    <td>Tanggal</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ijazah as $data)
                                @php
                                    $no = 1
                                @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nim }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            <form action="{{ route('update_ijazah') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$data->id}}" >
                                                <button class="btn btn-sm btn-success" name="submit_button" value="approve by {{Auth()->User()->level}}"><i class="fa fa-check"></i></button>
                                                <button class="btn btn-sm btn-danger" name="submit_button" value="reject by {{Auth()->User()->level}}"><i class="fa fa-times"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
