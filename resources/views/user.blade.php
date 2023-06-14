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
        <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Data User
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#akunModal">Tambah akun</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Email</td>
                                <td>Level</td>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($user)
                                @foreach ($user as $data)
                                @php
                                    $no = 1
                                @endphp
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            @if ($data->level == "mhs")
                                                <i class="badge badge-primary">Mahasiswa</i>
                                            @elseif ($data->level == "staff")
                                                <i class="badge badge-success">Staff</i>
                                            @elseif ($data->level == "dekan")
                                                <i class="badge badge-danger">dekan</i>
                                            @elseif ($data->level == "admin")
                                                <i class="badge badge-warning">Admin</i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="4">Tidak Ada Data</td></tr>
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
