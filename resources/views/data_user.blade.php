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
            @endisset
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('action_detail_user') }}" method="POST" class="user">
                        @csrf
                        <div class="row">
                            <div class="col-3 py-2 px-2">
                                NIM
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    @isset($detail_user[0])
                                        <input type="hidden" name="id" value="{{$detail_user[0]->id}}">
                                    @endisset
                                    <input type="hidden" name="user_id" value="{{Auth()->User()->id}}">
                                    <input type="text" class="form-control"
                                        id="nim" aria-describedby="nim" name="nim"
                                        placeholder="Enter Nim" required>
                                </div>
                            </div>

                            <div class="col-3 py-2 px-2">
                                Tempat Lahir
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
                                </div>
                            </div>

                            <div class="col-3 py-2 px-2">
                                Tanggal Lahir
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="date" class="form-control "
                                        id="tgl_lahir" name="tgl_lahir" required>
                                </div>
                            </div>

                            <div class="col-3 py-2 px-2">
                                Fakultas
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <select name="fakultas" class="form-control">
                                        <option value="sains dan teknologi">Sains Dan Teknologi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3 py-2 px-2">
                                Program Studi
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <select name="program_studi" class="form-control">
                                        <option value="sistem informasi">Sistem Informasi</option>
                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-9">
                            @isset($detail_user[0])
                                <button class="btn btn-sm btn-warning" type="submit" name="button" value="edit">Edit</button>
                            @else
                                <button class="btn btn-sm btn-primary" name="button" type="submit" value="tambah">Tambah</button>
                            @endisset
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
