@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Mahasiswa</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header d-md-flex justify-content-between align-items-center">
                    <h5 class="card-title text-center text-md-start">
                        Mahasiswa
                    </h5>

                    <div class=" mt-3 text-center mt-md-0 text-md-end">
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Alamat</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $item)
                                    @php
                                        $alamatJson = json_decode($item->alamat);
                                    @endphp
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nim }}</td>
                                        <td>{{ $alamatJson->alamat . ', ' . $alamatJson->provinsi }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('mahasiswa.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning me-1">Ubah</a>
                                            <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="fungsiHapus()">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
