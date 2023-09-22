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
                                {{-- @if ($pending < 1) --}}
                                    {{-- <a class="btn btn-sm btn-danger mb-2" href="{{ route('req_ijazah', ['nim' => $detail_user[0]->nim]) }}">Request Ijazah</a> --}}
                                    {{-- @endif --}}
                                    <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#reqIjazahModal">Request Ijazah</button>
                                    <button class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#reqIjazahWakilModal">Request Ijazah Wakilkan</button>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Nim</td>
                                        <td>Nama Ijazah</td>
                                        <td>Status</td>
                                        <td>Nama Approve</td>
                                        <td>Alasan</td>
                                        <td>Tanggal</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ijazah as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->nim }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->name_approve }}</td>
                                            <td>{{ $data->alasan }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>
                                                @if ($data->status == "approve by dekan")
                                                    @if ($data->nim_perwakilan != "")
                                                        <button class="btn btn-sm btn-primary mb-2" onclick="reqAmbilIjazahModalWakil({{$data->id}})">Ambil Ijazah</button>
                                                    @else
                                                        <button class="btn btn-sm btn-primary mb-2" onclick="reqAmbilIjazahModal({{$data->id}})">Ambil Ijazah</button>
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @include('layouts.modal_ijazah')
                        @else
                            @if (Auth()->User()->level == 'mhs')
                                {{-- Silahkan Request Ijazah Anda Dengan Klik Button Berikut <a href="{{ route('req_ijazah', ['nim' => $detail_user[0]->nim]) }}">Request Ijazah</a> --}}
                                <button class="btn btn-sm btn-primary mb-2" id="take" data-toggle="modal" data-target="#reqIjazahModal">Request Ijazah</button>
                                <button class="btn btn-sm btn-warning mb-2" id="take-wakil" data-toggle="modal" data-target="#reqIjazahWakilModal">Request Ijazah Wakilkan</button>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Nim</td>
                                            <td>Nama Ijazah</td>
                                            <td>Status</td>
                                            <td>Nama Approve</td>
                                            <td>Alasan</td>
                                            <td>Tanggal</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td colspan="7">Data Kosong</td>
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
                                    <td>Nama Approve</td>
                                    <td>Alasan</td>
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
                                        <td>{{ $data->name_approve }}</td>
                                        <td>{{ $data->alasan }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-success mb-2" onclick="accIjazahModal({{$data->id}},'{{Auth()->User()->level}}')">Approve</button>
                                            <button class="btn btn-sm btn-danger mb-2" onclick="rejIjazahModal({{$data->id}},'{{Auth()->User()->level}}')">Reject</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('layouts.modal_ijazah_staff_dekan')
                        @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
    function accIjazahModal(id, level) {
        const modal = document.getElementById("accIjazahModal");
        
        document.getElementById("id").value = id;
        document.getElementById("status").value = "approve by " + level;
        modal.style.display = "block";
    }
    
    function hideModal() {
        document.getElementById("accIjazahModal").style.display = "none";
    }
    
    function rejIjazahModal(id, level) {
        const modal = document.getElementById("rejIjazahModal");
        
        document.getElementById("id_rej").value = id;
        document.getElementById("status_rej").value = "reject by " + level;
        modal.style.display = "block";
    }
    
    function hideModalRej() {
        document.getElementById("rejIjazahModal").style.display = "none";
    }
    
    function reqAmbilIjazahModal(id) {
        const modal = document.getElementById("reqAmbilIjazahModal");
        console.log(id);
        document.getElementById("id_ambil").value = id;
        modal.style.display = "block";
    }
    
    function hideModalReq() {
        document.getElementById("reqAmbilIjazahModal").style.display = "none";
    }
    
    function reqAmbilIjazahModalWakil(id) {
        const modal = document.getElementById("reqAmbilIjazahWakilModal");
        
        document.getElementById("id_wakil").value = id;
        modal.style.display = "block";
    }
    
    function hideModalReq() {
        document.getElementById("reqAmbilIjazahWakilModal").style.display = "none";
    }

</script>
@endsection