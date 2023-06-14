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
            <div class="card shadow mb-4">
                <div class="card-header">
                    Data Ijazah
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="mb-2 row">
                        <div class="col-12">
                            <div class="col-2">
                                <form action="{{route('ijazah_admin')}}" method="GET">
                                    <select class="form-control" name="status">
                                        <option value="request ijazah">Request Ijazah</option>
                                        <option value="approve by staff">Approve By Staff</option>
                                        <option value="approve by dekan">Approve By Dekan</option>
                                    </select>
                                    <button type="submit" class="byn btn-sm btn-primary mt-1">cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
                            @isset($ijazah)
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
